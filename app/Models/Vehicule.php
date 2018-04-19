<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $table = 'vehicule';
    public $timestamps = false;
    protected $softDelete = false;


    /**
     * Récupération d'un vehicule
     * @param $noChassis
     * @return bool
     */
    public static function find($noChassis)
    {
        return self::where([
            'noChassis' => $noChassis,
        ])->first();
    }
    
    public function contrats()
    {
        return $this->hasOne('App\Models\Contrat', 'dossierNo', 'contratDossierNo');
    }
}
