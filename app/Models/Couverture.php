<?php

namespace App\Models;

use App\Lib\Message;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Couverture extends Model
{
    /**
     * Définition des règles de validation pour une nouvelle Couverture
     * @var array
     */
    public static $rules = [
        // Numéro du dossier du contrat : même règles que dans Contrat.php
        'contratDossierNo' => 'required|integer|min:1',
        // Numéro du client du contrat : même règles que dans Contrat.php
        'contratClientNo' => 'required|integer|min:0',
        // Reference du sinistre : même règles que dans Sinistre.php
        'sinistreReference' => 'required|alpha_num|min:4',
        // Date du sinistre : emême règle que dans Sinistre.php
        'sinistreDate' => 'required|date'
    ];

    protected $table = 'couverture';
    public $timestamps = false;
    protected $softDelete = false;

    /**
     * Valide les $inputs pour la création d'une nouvelle Couverture
     * @param array $inputs
     * @return mixed
     */
    public static function getValidation(array $inputs)
    {
        // Création du validateur
        $validator = Validator::make($inputs, self::$rules);

        // Ajout des conditions supplémentaires
        $validator->after(function ($validator) use ($inputs) {
            $sinistre = Sinistre::find($inputs['sinistreReference'], $inputs['sinistreDate']);
            // Vérification de l'existence du Sinistre
            if ($sinistre == null) {
                $validator->errors()->add('couverture', Message::get('sinistre.missing'));
            }
            $client = Client::find($inputs['contratClientNo']);
            // Vérification de l'existence du Client
            if ($client == null) {
                $validator->errors()->add('couverture', Message::get('client.missing'));
            }
            $contrat = Contrat::find($client, $inputs['contratDossierNo']);
            // Vérification de l'existence du Contrat
            if ($contrat == null) {
                $validator->errors()->add('couverture', Message::get('contrat.missing'));
            }
            // Vérifications suivantes seulement si le contrat et le sinistre existent.
            if ($contrat !== null && $sinistre !== null) {
                $couverture = self::find($contrat, $sinistre);
                // Vérification de la non-existence de la Couverture
                if ($couverture !== null) {
                    $validator->errors()->add('couverture', Message::get('couverture.exists'));
                // Vérification de la concordance des dates
                } elseif (!self::checkMatchingDates($contrat, $sinistre)) {
                    $validator->errors()->add('couverture', Message::get('couverture.date_error'));
                }
            }
        });

        // Renvoi du validateur
        return $validator;
    }

    /**
     * Récupération d'une couverture basée sur le contrat fourni et la sinistre fourni
     * @param $contrat
     * @param $sinistre
     * @return bool
     */
    public static function find($contrat, $sinistre)
    {
        return self::where([
            'contratDossierNo' => $contrat->dossierNo,
            'contratClientNo' => $contrat->clientNo,
            'sinistreReference' => $sinistre->reference,
            'sinistreDate' => $sinistre->date
        ])->first();
    }

    /**
     * Création d'une Couverture avec les $values reçues
     * @param array $values
     */
    public static function createOne(array $values)
    {
        // Nouvelle instance de Couverture
        $couv = new self();
        // Initialisation des propriétés
        $couv->contratDossierNo = $values['contratDossierNo'];
        $couv->contratClientNo = $values['contratClientNo'];
        $couv->sinistreReference = $values['sinistreReference'];
        $couv->sinistreDate = $values['sinistreDate'];
        // Enregistrement de l'instance
        $couv->save();
    }

    /**
     * Vérifie que la date du sinistre fourni bien comprise
     * entre la date de début (dateDebut) et la date de fin (dateEcheance) du contrat fourni
     * @param $contrat
     * @param $sinistre
     * @return bool
     */
    public static function checkMatchingDates($contrat, $sinistre)
    {
        return $contrat->dateDebut < $sinistre->date && $contrat->dateEcheance >= $sinistre->date;
    }
}
