<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Client extends Model
{
    /**
     * Définition des règles de validation pour un nouveau client
     * @var array
     */
    public static $rules = [
        
        'nom' => 'required',
        'adresse' => 'required',
        
        'contrat.0.type' => 'required|in:"RC","RC + Casco","RC ménage maison","RC ménage appartement"',
        'contrat.0.dateDebut' => ['required', 'date'],
        'contrat.0.dateEcheance' => 'required|date|after:contrat.0.dateDebut',
        
        'contrat.*.type' => 'required_with:contrat.*.dateDebut|required_with:contrat.*.dateEcheance|in:"RC","RC + Casco","RC ménage maison","RC ménage appartement"',
        'contrat.*.dateDebut' => ['required_with:contrat.*.type',
                                    'required_with:contrat.*.dateEcheance', 'date'],
        'contrat.*.dateEcheance' => 'required_with:contrat.*.type|required_with:contrat.*.dateDebut|date|after:contrat.*.dateDebut'
    ];

    protected $table = 'client';
    protected $primaryKey = 'numero';
    public $timestamps = false;


    public static function getValidation(array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        return $validator;
    }

    public static function saveOne(array $values)
    {
        $client = new self();

        $client->nom = $values['nom'];
        $client->adresse = $values['adresse'];

        $client->save();
        //dd($values);
        foreach ($values['contrat'] as $contrat) {
            $contrat['clientNo'] = $client->numero;
            Contrat::saveOne($contrat);
        }
    }
}
