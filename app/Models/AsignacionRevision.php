<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsignacionRevision extends Model
{
    use HasFactory;

    protected $table = 'asignaciones_revision';

    protected $fillable = [
        'evidencia_id',
        'revisor_id',
        'asignado_por_id',
        'fecha_limite',
        'estado',
    ];
    /* ! REVISAR !!!!!!!!!!!!!!!!!!!!!!!!! */
    protected $casts = [
        'fecha_limite' => 'date',
    ];


    public function evidencia(): BelongsTo
    {
        return $this->belongsTo(Evidencia::class, 'evidencia_id');
    }


    public function revisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'revisor_id');
    }

    public function asignadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'asignado_por_id');
    }

}
