<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Tarea;

class CriterioTarea extends Model
{
    use HasFactory;

    protected $table = 'criterios-tareas';

    protected $fillable = [
        'tarea_id',
        'actividad_id'
    ];


    public function tareaId(): BelongsTo
    {
        return $this->belongsTo(Tarea::class, 'tareas_id');
    }


    public function actividadId(): BelongsTo
    {
        return $this->belongsTo(CriterioEvaluacion::class, 'actividad_id');
    }
}
