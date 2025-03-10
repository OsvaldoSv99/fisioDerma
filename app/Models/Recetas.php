<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    protected $table = "recetas";
    protected $primaryKey = "id_receta";
    public $timestamps = false;
}
