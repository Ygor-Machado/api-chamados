<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartamentController extends Controller
{
    public function index()
    {
        $departament = Departament::all();

        return response()->json(["results" => $departament], Response::HTTP_OK);
    }

    public function store(Request $request, Departament $departament)
    {
        $data = $request->only(['name']);

        $departament = $departament->create($data);

        return response()->json(['message' => 'Departamento criado com sucesso!', 'departament' => $departament], Response::HTTP_CREATED);
    }

    public function show(Departament $departament)
    {
        return response()->json($departament, Response::HTTP_OK);
    }

    public function update(Request $request, Departament $departament)
    {
        $data = $request->only(['name']);

        $departament->update($data);

        return response()->json(['message' => 'Departamento atualizado com sucesso!', 'departament' => $departament], Response::HTTP_OK);
    }

    public function destroy(Departament $departament)
    {
        $departament->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
