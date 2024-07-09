<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantRequest;
use App\Models\Plant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            Plant::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PlantRequest $request): JsonResponse
    {
        $plant = new Plant();
        $plant = Plant::create($request->validated());

        return response()->json([
            'plant' => $plant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant): JsonResponse
    {
        return response()->json([
            'plant' => $plant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        //
    }
}
