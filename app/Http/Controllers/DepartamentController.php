<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departament = Departament::all();

        return response()->json(["results" =>$departament]);
    }

    public function store(Request $request, Departament $departament)
    {
        $data = $request->only(['name']);

        $departament = $departament->create($data);

        return response()->json(status: JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
