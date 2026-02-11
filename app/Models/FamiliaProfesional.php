<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamiliaProfesional extends Model
{
    use HasFactory;

    protected $table = 'familias-profesionales';

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
        'imagen',
    ];
}
