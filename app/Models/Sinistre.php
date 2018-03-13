<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use App\Lib\Message;

class Sinistre extends Model
{
    protected $table = 'sinistre';
    public $incrementing = false;
    public $timestamps = false;
    protected $softDelete = false;

    public static $rules = [
        'reference'=>'required|regex:/[A-Z]{3}[0-9]+/',
        'date'=>'required|date',
        'montant'=>'required|numeric|min:0',
    ];

    public static function getValidation(array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);
        
        $validator->after(function ($validator) use ($inputs) {
            $sinistre = self::find($inputs['reference'], $inputs['date']);

            if ($sinistre !== null) {
                $validator->errors()->add('exists', Message::get('sinistre.exists'));
            }
        });

        return $validator;
    }

    public static function find($reference, $date)
    {
        return self::where([
            'reference'=>$reference,
            'date'=>$date
        ])->first();
    }

    public static function saveOne(array $data)
    {
        $newSinistre = new Sinistre();

        $newSinistre->reference = $data['reference'];
        $newSinistre->date = $data['date'];
        $newSinistre->montant = $data['montant'];

        $newSinistre->save();
    }
}
