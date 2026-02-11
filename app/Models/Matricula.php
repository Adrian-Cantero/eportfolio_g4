<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculas';

    protected $fillable = [
        'estudiante_id',
        'modulo_formativo_id'
    ];

    public function estudianteId(): BelongsTo
    {
        return $this->belongsTo(User::class, 'estudiante_id');
    }

    public function moduloFormativoId(): BelongsTo
    {
        return $this->belongsTo(ModuloFormativo::class, 'modulo_formativo_id');
    }
}
