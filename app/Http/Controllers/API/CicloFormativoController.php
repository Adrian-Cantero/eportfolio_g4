<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CicloFormativoResource;
use App\Models\CicloFormativo;
use App\Models\FamiliaProfesional;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CicloFormativoController extends Controller
{
    public function index(Request $request)
    {
        $query = CicloFormativo::query();

        if ($request->has('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        return CicloFormativoResource::collection(
            $query->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    public function store(Request $request, FamiliaProfesional $familia, CicloFormativo $cicloFormativo)
    {

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:ciclos_formativos,codigo',
            'grado' => 'required|string|in:basico,medio,superior',
            'descripcion' => 'required|string',
        ]);

        if (Auth::user()->email != env('MAIL_ADMIN')) {
            return response()->json('Unauthorized', 403);
        }

        $validatedData['familia_profesional_id'] = $familia->id;

        $ciclo = CicloFormativo::create($validatedData);

        return new CicloFormativoResource($ciclo);
    }

    public function show(FamiliaProfesional $familia, CicloFormativo $cicloFormativo)
    {
        return new CicloFormativoResource($cicloFormativo);
    }

    public function update(Request $request, FamiliaProfesional $familia, CicloFormativo $cicloFormativo)
    {

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:ciclos_formativos,codigo,',
            'grado' => 'required|string|in:basico,medio,superior',
            'descripcion' => 'required|string',
        ]);

        if (Auth::user()->email != env('MAIL_ADMIN')) {
            return response()->json('Unauthorized', 403);
        }

        $cicloFormativo->update($validatedData);

        return new CicloFormativoResource($cicloFormativo);
    }

    public function destroy(CicloFormativo $cicloFormativo, FamiliaProfesional $familia)
    {
        if (Auth::user()->email != env('MAIL_ADMIN')) {
            return response()->json('Unauthorized', 403);
        }

        try {
            $cicloFormativo->delete();
            return response()->json('CicloFormativo eliminado correctamente', 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
