<?php

namespace App\Models;

use App\Lib\Message;
use Illuminate\Database\Eloquent\Model;
use Validator;

class LigneCommande extends Model {

    /**
     * Définition des règles de validation pour une nouvelle ligne de commande
     * @var array
     */
    public static $rules = [
        'quantite' => ['required', 'numeric', 'min:0'],
        'commandeNo' => ['required', 'integer', 'min:0'],
        'articleNo' => ['required', 'integer', 'min:0'],
    ];

    protected $table = 'lignecommande';
    public $timestamps = false;
    protected $softDelete = false;

    /**
     * Valide les $inputs pour la création d'une nouvelle Ligne de Commande
     * @param array $inputs
     * @return mixed
     */
    public static function getValidation(array $inputs) {
        // Création du validateur
        $validator = Validator::make($inputs, self::$rules);
        // Ajout des contraintes supplémentaires
        $validator->after(function ($validator) use ($inputs) {
            $commande = Commande::find($inputs['commandeNo']);
            // Vérification de l'existence de la commande
            if ($commande == null) {
                $validator->errors()->add('missing', Message::get('commande.missing'));
            }
            $articlePublicitaire = ArticlePublicitaire::find($inputs['articleNo']);
            // Vérification de l'existence de l'article
            if ($articlePublicitaire == null) {
                $validator->errors()->add('missing', Message::get('article.missing'));
                // Vérification de la disponibilité de l'article
            } elseif (!$articlePublicitaire->isAvailable()) {
                $validator->errors()->add('unavailable', Message::get('article.unavailable'));
            }

            // Vérification supplémentaire seulement si l'article et la commande existent.
            if ($articlePublicitaire !== null && $commande !== null) {
                $ligneCommande = self::find($commande, $articlePublicitaire);
                // Vérification de la non-existence de la ligne de commande
                if ($ligneCommande !== null) {
                    $validator->errors()->add('exists', Message::get('ligne.exists'));
                }
            }
        });
        // Renvoi du validateur
        return $validator;
    }

    /**
     * Récupère une Ligne de Commande
     * @param $commande
     * @param $article
     * @return null|LigneCommande
     */
    public static function find($commande, $article) {
        // Ligne de commande a une clé composée, donc find() ne peut être utilisé.
        return self::where('commandeNo', $commande->numero)->where('articleNo', $article->numero)->first();
    }

    /**
     * Créer une ligne de commande en fonction des $values reçus
     * @param array $values
     */
    public static function createOne(array $values) {
        // Création d'une nouvelle instance de LigneCommande
        $obj = new self(); // ou : $obj = new LigneCommande;
        // Initialisation les propriétés
        $obj->quantite = $values['quantite'];
        $obj->commandeNo = $values['commandeNo'];
        $obj->articleNo = $values['articleNo'];
        // Enregistrement de l'instance en base de donnée
        $obj->save();
    }
}
