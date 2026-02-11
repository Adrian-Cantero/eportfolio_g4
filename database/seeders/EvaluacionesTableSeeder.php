<?php

namespace Database\Seeders;

use App\Models\Evaluacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluacion::truncate();

        foreach (self::$evaluaciones as $evaluacion) {
            DB::table('evaluaciones-evidencias')->insert([
                'puntuacion' => $evaluacion['puntuacion'],
                'estado' => $evaluacion['estado']
            ]);
        }
        $this->command->info('¡Tabla evaluaciones inicializada con datos!');
    }

    public static $evaluaciones = [
        ['puntuacion' => 50.5, 'estado' => 'pendiente'],
        ['puntuacion' => 70, 'estado' => 'aprobada']
    ];
}
