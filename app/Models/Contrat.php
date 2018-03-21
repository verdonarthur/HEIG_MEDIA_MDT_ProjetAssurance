<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Contrat extends Model {
    protected $table = 'contrat';
    public $timestamps = false;

    public static $rules = [
        'type'=>'required|in:"RC","RC + Casco","RC ménage maison","RC ménage appartement"',
        'dateDebut'=>'required|date',
        'dateEcheance'=>'required|date',
        'clientNo'=>'required|integer|min:0',
    ];

    public static function getValidation($inputs) {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs) {
            $client = Client::find($inputs['clientNo']);

            if ($client == null) {
                $validator->errors()->add('missing', Message::get('client.missing'));
                return $validator;
            }

            $contrat = self::find($client->numero, self::getLastDossierNo($client->numero));

            if ($contrat !== null) {
                $validator->errors()->add('exists', Message::get('contrat.exists'));

            }
        });

        return $validator;
    }

    public static function find($clientNo, $dossierNo) {
        return self::where('clientNo', $clientNo)->where('dossierNo', $dossierNo)->first();
    }

    public static function getLastDossierNo($clientNo){
        return self::where('clientNo', $clientNo)->max('dossierNo') + 1;
    }

    public static function saveOne(array $values) {
        $newContrat = new self();

        $newContrat->dossierNo = self::getLastDossierNo($values['clientNo']);
        $newContrat->clientNo = $values['clientNo'];
        $newContrat->type = $values['type'];
        $newContrat->dateDebut = $values['dateDebut'];
        $newContrat->dateEcheance = $values['dateEcheance'];

        $newContrat->save();
    }
}
