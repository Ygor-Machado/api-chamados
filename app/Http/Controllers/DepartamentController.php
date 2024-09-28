<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartamentController extends Controller
{

    public function index()
    {
        $departament = Departament::all();

        return response()->json(["results" =>$departament]);
    }

    public function store(Request $request, Departament $departament)
    {
        $data = $request->only(['name']);

        $departament = $departament->create($data);

        return response()->json(status: Response::HTTP_CREATED);
    }

    public function show(Departament $departament)
    {
        return response()->json($departament);
    }

    public function update(Request $request, Departament $departament)
    {
        $data = $request->only(['name']);

        $departament->update($data);

        return response()->json($departament);
    }

    public function destroy(Departament $departament)
    {
        $departament->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}
