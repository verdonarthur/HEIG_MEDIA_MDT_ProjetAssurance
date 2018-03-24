<?php

namespace App\Models;

use App\Lib\Message;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Commande extends Model
{
    /**
     * Définition des règles de validation pour une nouvelle Commande
     * @var array
     */
    public static $rules = [
        // obligatoire, nombre entier supérieur à 0
        'clientNo' => ['required', 'integer', 'min:1'],
        // obligatoire, format date
        'date' => ['required', 'date'],
        // La première ligne de commande est obligatoire...
        // Numéro obligatoire, nombre entier supérieur à 1
        'ligne.0.articleNo' => ['required', 'integer', 'min:1'],
        // Quantité obligatoire, nombre supérieur à 0
        'ligne.0.quantite' => ['required', 'numeric', 'min:0'],
        // Les autres lignes de commande sont optionnel (pas de required)
        // Numéro obligatoire si quantité présente, nombre entier supérieur à 1
        'ligne.*.articleNo' => ['required_with:ligne.*.quantite', 'integer', 'min:1'],
        // Quantité obligatoire si numéro présent, nombre supérieur à 0
        'ligne.*.quantite' => ['required_with:ligne.*.articleNo', 'numeric', 'min:0'],
    ];

    protected $table = 'commande';
    protected $primaryKey = 'numero';
    public $timestamps = false;
    /**
     * Valide les $inputs pour la création d'une nouvelle Commande
     * @param array $inputs
     * @return mixed
     */
    public static function getValidation(array $inputs)
    {
        // Création du validateur avec les inputs nettoyés et les règles
        $validator = Validator::make($inputs, self::$rules);
        // Ajout des contraintes supplémentaires
        $validator->after(function ($validator) use ($inputs) {
            $client = Client::find($inputs['clientNo']);
            // Vérification de l'existence du client
            if ($client == null) {
                $validator->errors()->add('client', Message::get('client.missing'));
            }

            // Pour chaque ligne de commande, il faut vérifier l'existence de l'article et sa disponibilité
            foreach ($inputs['ligne'] as $ligne) {
                // Le fait d'avoir mis required_with pour les lignes de commande assure que la validation
                // ne passera pas si une ligne ne contient pas de numéro d'article mais une quantité, et inversement
                // Par contre, les validation supplémentaires sont exécutées dans TOUS LES CAS.
                // Puisqu'il est possible que articleNo n'existe pas dans la ligne (à cause du nettoyage effectué plus haut),
                // il faut vérifier son existence avant de vérifier quoi que ce soit, sous peine d'une erreur d'index inexistant
                // Ceci est important dans le cas où nous recevons une ligne de ce genre :
                //  $ligne [
                //      'quantite' => 5
                //  ]
                if (array_key_exists('articleNo', $ligne)) {
                    $articlePublicitaire = ArticlePublicitaire::find($ligne['articleNo']);
                    // Vérification de l'existence de l'article
                    if ($articlePublicitaire == null) {
                        $validator->errors()
                            ->add('article', Message::get('article.nb.missing', ['nb' => $ligne['articleNo']]));
                        // Vérification de la disponibilité de l'article existant
                    } else if (!$articlePublicitaire->isAvailable()) {
                        $validator->errors()
                            ->add('article', Message::get('article.nb.unavailable', ['nb' => $ligne['articleNo']]));
                    }
                }
            }
        });
        // Renvoi du validateur complet
        return $validator;
    }

    /**
     * Créer une nouvelle commande avec les $values reçus
     * Si une erreur est envoyée lors de la création d'une commande
     * ou de n'importe laquelle de ses lignes de commande,
     * elle sera interceptée par la méthode store()
     * @param array $values
     */
    public static function createOne(array $values)
    {
        // Nouvelle instance de commande
        $com = new self();
        // On renseigne les propriétés de la commande
        $com->clientNo = $values['clientNo'];
        $com->date = $values['date'];
        // On sauve la commande
        $com->save();
        // L'ID de la commande nouvelle créée
        // est rajouté à la propriété $com->numero

        // Pour chaque ligne de commande...
        foreach ($values['ligne'] as $ligne) {
            // ...on insert l'id de la commande créée
            $ligne['commandeNo'] = $com->numero;
            // On sauve la nouvelle ligne de commande, en utilisant
            // la méthode que nous avions déjà codé auparavant.
            LigneCommande::createOne($ligne);
        }
    }
}
