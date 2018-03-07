<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ArticlePublicitaire extends Model
{
    protected $table = 'articlepublicitaire';
    protected $primaryKey = 'numero';
    public $timestamps = false;
    public static $rules = [
        'numero'=>'required|integer|min:1',
        'descriptif'=>'required',
        'prixUnitaire'=>'required|integer|min:0',
        'disponibilite'=>'required|in:"Oui","Non"',
    ];

    public static function getValidation(array $inputs)
    {
        $validator = Validator::make($inputs, self::$rules);

        $validator->after(function ($validator) use ($inputs) {
            $articlePublicitaire = self::find($inputs['numero']);

            if ($articlePublicitaire !== null) {
                $validator->errors()->add('exists', Message::get('article.exists'));
            }
        });

        return $validator;
    }
}
