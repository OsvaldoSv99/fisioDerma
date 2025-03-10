<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table ="paciente";
    protected $primaryKey = "id_paciente";
    public $timestamps = false;
}
