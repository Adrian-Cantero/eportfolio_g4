<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CriterioEvaluacion extends Model
{
    use HasFactory;

    protected $table = 'criterios_evaluacion';

    protected $fillable = [
        'id',
        'resultado_aprendizaje_id',
        'codigo',
        'descripcion',
        'peso_porcentaje',
        'orden'
    ];

    public function resultadoAprendizaje(): BelongsTo
    {
        return $this->belongsTo(ResultadoAprendizaje::class, 'resultado_aprendizaje_id');
    }
}
