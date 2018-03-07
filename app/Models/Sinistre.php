<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Sinistre extends Model
{
    protected $table = 'sinistre';
    public $primaryKey = 'reference';
    public $incrementing = false;
    public $timestamps = false;
    public static $rules = [
        'reference'=>'required|regex:([A-Z]{3}[0-9]+)',
        'date'=>'required|date_format:Y-m-d',
        'montant'=>'required|integer|min:0',
    ];

    public static function getValidation(array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);
        
        $validator->after(function ($validator) use ($inputs) {
            $sinistre = self::find($inputs['reference']);

            if ($sinistre !== null) {
                $validator->errors()->add('exists', Message::get('sinistre.exists'));
            }
        });

        return $validator;
    }
}
