<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FamiliaProfesionalResource;
use App\Models\FamiliaProfesional;
use Illuminate\Http\Request;

class FamiliaProfesionalController extends Controller
{
    public function index(Request $request)
    {
        $query = FamiliaProfesional::query();

        if ($request->has('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        return FamiliaProfesionalResource::collection(
            $query->orderBy(
                $request->sort ?? 'id',
                $request->order ?? 'asc'
            )->paginate($request->per_page)
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255|',
            'codigo' => 'required|string|max:50|unique:familias_profesionales,codigo',
            'descripcion' => 'nullable|string'
        ]);

        $familia = FamiliaProfesional::create($validatedData);

        return new FamiliaProfesionalResource($familia);
    }

    public function show(FamiliaProfesional $familia)
    {
        return new FamiliaProfesionalResource($familia);
    }

    public function update(Request $request, FamiliaProfesional $familia)
    {
        $data = json_decode($request->getContent(), true);

        $familia->update($data);

        return new FamiliaProfesionalResource($familia);
    }

    public function destroy(FamiliaProfesional $familia)
    {
        try {
            $familia->delete();
            return response()->json(["message" => "FamiliaProfesional eliminado correctamente"], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
