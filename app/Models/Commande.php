<?php

namespace App\Models;

use App\Lib\Message;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Commande extends Model
{
    protected $table = 'commande';
    protected $primaryKey = 'numero';
    public $timestamps = false;
}
