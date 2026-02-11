<?php

use App\Http\Controllers\API\CicloFormativoController;
use App\Http\Controllers\API\ComentarioController;
use App\Http\Controllers\API\CriterioEvaluacionController;
use App\Http\Controllers\API\EvaluacionController;
use App\Http\Controllers\API\FamiliaProfesionalController;
use App\Http\Controllers\API\MatriculaController;
use App\Http\Controllers\API\ModuloFormativoController;
use App\Http\Controllers\API\ResultadoAprendizajeController;
use App\Http\Controllers\API\AsignacionRevisionController;
use App\Http\Controllers\API\CriterioTareaController;
use App\Http\Controllers\API\EvidenciasController as APIEvidenciasController;
use App\Http\Controllers\API\TareasController;
use App\Http\Controllers\API\TokenController;
use App\Http\Controllers\EvidenciasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            $user = $request->user();
            $user->fullName = $user->nombre . ' ' . $user->apellidos;
            return $user;
        });
    });

    Route::apiResource('resultados-aprendizaje', ResultadoAprendizajeController::class)->parameters([
        'resultados-aprendizaje' => 'resultadoAprendizaje'
    ]);

    Route::apiResource('resultados-aprendizaje.criterios-evaluacion', ResultadoAprendizajeController::class)->parameters([
        'resultados-aprendizaje' => 'resultadoAprendizaje'
    ]);

    Route::apiResource('criterios-evaluacion', CriterioEvaluacionController::class)->parameters([
        'criterios-evaluacion' => 'criterioEvaluacion'
    ]);

    Route::apiResource('matriculas', MatriculaController::class)->parameters([
        'matriculas' => 'matricula'
    ]);

    Route::apiResource('familias-profesionales', FamiliaProfesionalController::class)
        ->parameters(['familias-profesionales' => 'familia']);

    Route::apiResource('familias-profesionales.ciclos-formativos', CicloFormativoController::class)
        ->parameters([
            'familias-profesionales' => 'familia',
            'ciclos-formativos' => 'cicloFormativo'
    ]);

    Route::apiResource('ciclos-formativos.modulos-formativos', ModuloFormativoController::class)->parameters([
            'ciclos-formativos' => 'cicloFormativo',
            'modulos-formativos' => 'moduloFormativo'
    ]);

    Route::apiResource('evaluaciones-evidencias', EvaluacionController::class)
    ->parameters([
        'evaluaciones-evidencias' => 'evaluacionEvidencia'
    ]);

    Route::apiResource('comentarios', ComentarioController::class)
    ->parameters([
        'comentarios' => 'comentario'
    ]);

    Route::apiResource('asignaciones-revision', AsignacionRevisionController::class)->parameters([
        'asignaciones-revision' => 'asignacionRevision'
    ]);

    Route::apiResource('criterios-tarea', CriterioTareaController::class)->parameters([
        'criterios-tarea' => 'criterioTarea'
    ]);

    Route::apiResource('evidencias.asignaciones-revision', AsignacionRevisionController::class)
        ->parameters([
            'evidencias' => 'evidencia',
            'asignaciones-revision' => 'asignacionRevision'
    ]);

     Route::apiResource('tareas', TareasController::class)->parameters([
            'tareas' => 'tarea'
        ]);

    Route::apiResource('tareas.evidencias', APIEvidenciasController::class)
        ->parameters([
            'tareas' => 'tarea',
            'evidencias' => 'evidencia'
    ]);

    Route::apiResource('criterios-evaluacion.tareas', TareasController::class)->parameters([
        'criterios-evaluacion' => 'criterioEvaluacion',
        'tareas' => 'tarea'
    ]);

    Route::post('tokens', [TokenController::class, 'store']);
    // elimina el token del usuario autenticado
    Route::delete('tokens', [TokenController::class, 'destroy'])->middleware('auth:sanctum');
});



Route::any('/{any}', function (ServerRequestInterface $request) {
    $config = new Config([
        'address' => env('DB_HOST', '127.0.0.1'),
        'database' => env('DB_DATABASE', 'forge'),
        'username' => env('DB_USERNAME', 'forge'),
        'password' => env('DB_PASSWORD', ''),
        'basePath' => '/api',
    ]);
    $api = new Api($config);
    $response = $api->handle($request);

    try {
        $records = json_decode($response->getBody()->getContents())->records;
        $response = response()->json($records, 200, $headers = ['X-Total-Count' => count($records)]);
    } catch (\Throwable $th) {

    }
    return $response;

})->where('any', '.*'); //->middleware('auth:sanctum');

