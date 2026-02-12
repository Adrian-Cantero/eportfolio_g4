<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CriterioEvaluacionResource;
use App\Models\CriterioEvaluacion;
use App\Models\ResultadoAprendizaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CriterioEvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CriterioEvaluacion::query();

        if ($request->has('search')) {
            $query->where('descripcion', 'like', '%' .$request->search . '%');
        }

        return CriterioEvaluacionResource::collection(
            $query->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
            ->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ResultadoAprendizaje $resultadoAprendizaje)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:50|unique:criterios_evaluacion,codigo',
            'descripcion' => 'required|string',
            'peso_porcentaje' => 'required|numeric|min:0|max:100',
            'orden' => 'required|integer|min:1'
        ]);

        $validatedData['resultado_aprendizaje_id'] = $resultadoAprendizaje->id;

        $criterioEvaluacion = CriterioEvaluacion::create($validatedData);

        return new CriterioEvaluacionResource($criterioEvaluacion);
    }

    /**
     * Display the specified resource.
     */
    public function show(CriterioEvaluacion $criterioEvaluacion)
    {
        return new CriterioEvaluacionResource($criterioEvaluacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CriterioEvaluacion $criterioEvaluacion)
    {
        if (Auth::user()->email != env('ADMIN_EMAIL')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $criterioEvaluacionData = json_decode($request->getContent(), true);
        $criterioEvaluacion->update($criterioEvaluacionData);

        return new CriterioEvaluacionResource($criterioEvaluacion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CriterioEvaluacion $criterioEvaluacion)
    {
        try {
            $criterioEvaluacion->delete();
            return response()->json(['message' => 'Criterio de Evaluación eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
