<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CicloFormativoResource;
use App\Models\CicloFormativo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CicloFormativoController extends Controller
{
    public function index(Request $request, $familia)
    {
        $query = CicloFormativo::query();
        $query->where('familia_profesional_id', $familia->id);

         if ($request->q) {
            $query->where(function ($q) use ($request) {
                $q->orWhere("nombre", "like", "%" . $request->q . "%")
                    ->orWhere("codigo", "like", "%" . $request->q . "%")
                    ->orWhere("grado", "like", "%" . $request->q . "%");
            });
        }

        return CicloFormativoResource::collection(
            $query->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    public function store(Request $request, $familiaId)
    {
        if (Auth::user()->email != env('MAIL_ADMIN')) {
            return response()->json('Error', 422);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:ciclos-formativos,codigo',
            'grado' => 'required|string|in:basico,medio,superior',
            'descripcion' => 'nullable|string',
        ]);

        $ciclo = CicloFormativo::create($validatedData);

        return new CicloFormativoResource($ciclo);
    }

    public function show($familiaId, CicloFormativo $cicloFormativo)
    {
        return new CicloFormativoResource($cicloFormativo);
    }

    public function update(Request $request, $familiaId, CicloFormativo $cicloFormativo)
    {
        if (Auth::user()->email != env('MAIL_ADMIN')) {
            return response()->json('Error', 422);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:ciclo_formativos,codigo,' . $cicloFormativo->id,
            'grado' => 'required|string|in:basico,medio,superior',
            'descripcion' => 'nullable|string',
        ]);

        $cicloFormativo->update($validatedData);

        return new CicloFormativoResource($cicloFormativo);
    }

    public function destroy($familiaId, CicloFormativo $cicloFormativo)
    {
        if (Auth::user()->email != env('MAIL_ADMIN')) {
            return response()->json('Error', 422);
        }

        try {
            $cicloFormativo->delete();
            return response()->json(null, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
