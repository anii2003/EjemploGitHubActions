<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $table = 'premios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'anio',
        'autor',
    ];
}