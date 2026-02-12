<?php

namespace Database\Seeders;

use App\Models\CriterioEvaluacion;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriosEvaluacionTableSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CriterioEvaluacion::truncate();

        foreach (self::$criterios as $criterio) {
            $c = new CriterioEvaluacion();
            $c->resultado_aprendizaje_id = $criterio['resultado_aprendizaje_id'];
            $c->codigo = $criterio['codigo'];
            $c->descripcion = $criterio['descripcion'];
            $c->peso_porcentaje = $criterio['peso_porcentaje'];
            $c->orden = $criterio['orden'];

            $c->save();
        }
    }
    private static $criterios = [
        // =============================
        // RESULTADO DE APRENDIZAJE 1
        // =============================
        [
            'resultado_aprendizaje_id' => 1,
            'codigo' => '1.a',
            'descripcion' => 'Se han caracterizado y diferenciado los modelos de ejecución de código en el servidor y en el cliente web.',
            'peso_porcentaje' => 10,
            'orden' => 1,
        ],
        [
            'resultado_aprendizaje_id' => 1,
            'codigo' => '1.b',
            'descripcion' => 'Se han reconocido las ventajas que proporciona la generación dinámica de páginas.',
            'peso_porcentaje' => 20,
            'orden' => 2,
        ],
        [
            'resultado_aprendizaje_id' => 1,
            'codigo' => '1.c',
            'descripcion' => 'Se han identificado los mecanismos de ejecución de código en los servidores web.',
            'peso_porcentaje' => 10,
            'orden' => 3,
        ],
        [
            'resultado_aprendizaje_id' => 1,
            'codigo' => '1.d',
            'descripcion' => 'Se han reconocido las funcionalidades que aportan los servidores de aplicaciones y su integración con los servidores web.',
            'peso_porcentaje' => 10,
            'orden' => 4,
        ],
        [
            'resultado_aprendizaje_id' => 1,
            'codigo' => '1.e',
            'descripcion' => 'Se han identificado y caracterizado los principales lenguajes y tecnologías relacionados con la programación web en entorno servidor.',
            'peso_porcentaje' => 10,
            'orden' => 5,
        ],
        [
            'resultado_aprendizaje_id' => 1,
            'codigo' => '1.f',
            'descripcion' => 'Se han verificado los mecanismos de integración de los lenguajes de marcas con los lenguajes de programación en entorno servidor.',
            'peso_porcentaje' => 10,
            'orden' => 6,
        ],
        [
            'resultado_aprendizaje_id' => 1,
            'codigo' => '1.g',
            'descripcion' => 'Se han reconocido y evaluado las herramientas y frameworks de programación en entorno servidor.',
            'peso_porcentaje' => 10,
            'orden' => 7,
        ],

        // =============================
        // RESULTADO DE APRENDIZAJE 2
        // =============================
        [
            'resultado_aprendizaje_id' => 2,
            'codigo' => '2.a',
            'descripcion' => 'Se han reconocido los mecanismos de generación de páginas web a partir de lenguajes de marcas con código embebido.',
            'peso_porcentaje' => 10,
            'orden' => 1,
        ],
        [
            'resultado_aprendizaje_id' => 2,
            'codigo' => '2.b',
            'descripcion' => 'Se han identificado las principales tecnologías asociadas.',
            'peso_porcentaje' => 10,
            'orden' => 2,
        ],
        [
            'resultado_aprendizaje_id' => 2,
            'codigo' => '2.c',
            'descripcion' => 'Se han utilizado etiquetas para la inclusión de código en el lenguaje de marcas.',
            'peso_porcentaje' => 10,
            'orden' => 3,
        ],
        [
            'resultado_aprendizaje_id' => 2,
            'codigo' => '2.d',
            'descripcion' => 'Se ha reconocido la sintaxis del lenguaje de programación que se ha de utilizar.',
            'peso_porcentaje' => 10,
            'orden' => 4,
        ],
        [
            'resultado_aprendizaje_id' => 2,
            'codigo' => '2.e',
            'descripcion' => 'Se han escrito sentencias simples y se han comprobado sus efectos en el documento resultante.',
            'peso_porcentaje' => 10,
            'orden' => 5,
        ],
        [
            'resultado_aprendizaje_id' => 2,
            'codigo' => '2.f',
            'descripcion' => 'Se han utilizado directivas para modificar el comportamiento predeterminado.',
            'peso_porcentaje' => 10,
            'orden' => 6,
        ],
        [
            'resultado_aprendizaje_id' => 2,
            'codigo' => '2.g',
            'descripcion' => 'Se han utilizado los distintos tipos de variables y operadores disponibles en el lenguaje.',
            'peso_porcentaje' => 10,
            'orden' => 7,
        ],
        [
            'resultado_aprendizaje_id' => 2,
            'codigo' => '2.h',
            'descripcion' => 'Se han identificado los ámbitos de utilización de las variables.',
            'peso_porcentaje' => 10,
            'orden' => 8,
        ],

        // =============================
        // RESULTADO DE APRENDIZAJE 3
        // =============================
        [
            'resultado_aprendizaje_id' => 3,
            'codigo' => '3.a',
            'descripcion' => 'Se han utilizado mecanismos de decisión en la creación de bloques de sentencias.',
            'peso_porcentaje' => 10,
            'orden' => 1,
        ],
        [
            'resultado_aprendizaje_id' => 3,
            'codigo' => '3.b',
            'descripcion' => 'Se han utilizado bucles y se ha verificado su funcionamiento.',
            'peso_porcentaje' => 10,
            'orden' => 2,
        ],
        [
            'resultado_aprendizaje_id' => 3,
            'codigo' => '3.c',
            'descripcion' => 'Se han utilizado matrices (arrays) para almacenar y recuperar conjuntos de datos.',
            'peso_porcentaje' => 10,
            'orden' => 3,
        ],
        [
            'resultado_aprendizaje_id' => 3,
            'codigo' => '3.d',
            'descripcion' => 'Se han creado y utilizado funciones.',
            'peso_porcentaje' => 10,
            'orden' => 4,
        ],
        [
            'resultado_aprendizaje_id' => 3,
            'codigo' => '3.e',
            'descripcion' => 'Se han utilizado formularios web para interactuar con el usuario del navegador web.',
            'peso_porcentaje' => 10,
            'orden' => 5,
        ],
        [
            'resultado_aprendizaje_id' => 3,
            'codigo' => '3.f',
            'descripcion' => 'Se han empleado métodos para recuperar la información introducida en el formulario.',
            'peso_porcentaje' => 10,
            'orden' => 6,
        ],
        [
            'resultado_aprendizaje_id' => 3,
            'codigo' => '3.g',
            'descripcion' => 'Se han añadido comentarios al código.',
            'peso_porcentaje' => 10,
            'orden' => 7,
        ],
    ];
}
