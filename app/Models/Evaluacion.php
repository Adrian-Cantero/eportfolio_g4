<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones_evidencias';

    protected $fillable = [
        'id',
        'evidencia_id',
        'user_id',
        'puntuacion',
        'estado',
        'observaciones'
    ];

    public function evidencia(): BelongsTo
    {
        return $this->belongsTo(Evaluacion::class, 'evidencia_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
