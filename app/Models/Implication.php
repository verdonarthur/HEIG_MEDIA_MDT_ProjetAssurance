<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use App\Lib\Message;

class Implication extends Model
{
    /**
     * Définition des règles de validation pour une nouvelle Couverture
     * @var array
     */
    public static $rules = [
        'vehiculeNoChassis' => 'required|alpha_num|min:9',
        'sinistreReference' => 'required|alpha_num|min:4',
        'sinistreDate' => 'required|date'
    ];

    protected $table = 'implication';
    public $timestamps = false;
    protected $softDelete = false;

    /**
     * Valide les $inputs pour la création d'une nouvelle Implication
     * @param array $inputs
     * @return mixed
     */
    public static function getValidation(array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs) {
            
            $sinistre = Sinistre::find($inputs['sinistreReference'], $inputs['sinistreDate']);
            if ($sinistre == null) {
                $validator->errors()->add('couverture', Message::get('sinistre.missing'));
                return $validator;
            }

            $vehicule = Vehicule::find($inputs['vehiculeNoChassis']);
            if ($vehicule == null) {
                $validator->errors()->add('vehicule', Message::get('vehicule.missing'));
                return $validator;
            }

            $implication = self::find($vehicule, $sinistre);
            if ($implication !== null) {
                $validator->errors()->add('implication', Message::get('implication.exists'));
                return $validator;
            }
            
            $contrat = \App\Models\Contrat::find($vehicule->contratClientNo, $vehicule->contratDossierNo);
            if ($contrat == null) {
                $validator->errors()->add('implication', Message::get('vehicule.contratMissing'));
                return $validator;
            }
            
            if (!($contrat->type == "RC" || $contrat->type == "RC + Casco")) {
                $validator->errors()->add('implication', Message::get('implication.badContratType'));
                return $validator;
            }

            $couverture = \App\Models\Couverture::find($contrat, $sinistre);
            if ($couverture == null) {
                $validator->errors()->add('implication', Message::get('couverture.missing'));
                return $validator;
            }
        });

        // Renvoi du validateur
        return $validator;
    }

    /**
     * Récupération d'une implication basée sur le vehicule fourni et le sinistre fourni
     * @param $contrat
     * @param $sinistre
     * @return bool
     */
    public static function find($vehicule, $sinistre)
    {
        return self::where([
            'vehiculeNoChassis' => $vehicule->noChassis,
            'sinistreReference' => $sinistre->reference,
            'sinistreDate' => $sinistre->date
        ])->first();
    }

    /**
     * Création d'une Couverture avec les $values reçues
     * @param array $values
     */
    public static function saveOne(array $values)
    {
        $implication = new self();

        $implication->vehiculeNoChassis = $values['vehiculeNoChassis'];
        $implication->sinistreReference = $values['sinistreReference'];
        $implication->sinistreDate = $values['sinistreDate'];
        $implication->save();
    }
}
