<?php

namespace App\Http\Controllers;

use App\Models\Premio;
use Illuminate\Http\Request;

class PremiosController extends Controller
{
    public function index()
    {
        return response()->json(Premio::all(), 200);
    }

    public function show($id)
    {
        $premio = Premio::find($id);

        if (!$premio) {
            return response()->json(['error' => 'Premio not found'], 404);
        }

        return response()->json($premio, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'      => 'required|string',
            'descripcion' => 'nullable|string',
            'anio'        => 'required|integer',
            'autor'       => 'required|string',
        ]);

        $premio = Premio::create($request->all());
        return response()->json($premio, 201);
    }

    public function update(Request $request, $id)
    {
        $premio = Premio::find($id);
        if (!$premio) {
            return response()->json(['error' => 'Premio not found'], 404);
        }

        $this->validate($request, [
            'nombre'      => 'sometimes|string',
            'descripcion' => 'sometimes|string',
            'anio'        => 'sometimes|integer',
            'autor'       => 'sometimes|string',
        ]);

        $premio->update($request->all());
        return response()->json($premio, 200);
    }

    public function destroy($id)
    {
        $premio = Premio::find($id);
        if (!$premio) {
            return response()->json(['error' => 'Premio not found'], 404);
        }

        $premio->delete();
        return response()->json(['message' => 'Premio deleted'], 200);
    }
}