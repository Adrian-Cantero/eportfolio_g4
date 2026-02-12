<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloFormativo extends Model
{
    use HasFactory;

    protected $table = 'ciclos_formativos';

    protected $fillable = [
        'id',
        'familia_profesional_id',
        'nombre',
        'codigo',
        'grado',
        'descripcion',
    ];
}
