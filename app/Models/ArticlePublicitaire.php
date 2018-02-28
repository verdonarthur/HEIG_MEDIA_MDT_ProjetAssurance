<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticlePublicitaire extends Model
{
    protected $table = 'articlepublicitaire';
    protected $primaryKey = 'numero';
    public $timestamps = false;
}
