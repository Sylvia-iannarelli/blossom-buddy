<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantRequest;
use App\Models\Plant;
use App\Services\PerenualApiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    protected $perenualApiService;

    public function __construct(PerenualApiService $perenualApiService)
    {
        $this->perenualApiService = $perenualApiService;
    }

    /**
     * Update listing via API.
     */
    public function update()
    {
        $this->perenualApiService->integratePlantData();
    }

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
     * Create a new resource in storage.
     */
    public function create(PlantRequest $request): JsonResponse
    {
        $plant = new Plant();
        $plant = Plant::create($request->validated());

        return response()->json(
            $plant,
            201
        );
    }

    /**
     * Edit the specified resource.
     */
    public function read(string $common_name): JsonResponse
    {
        $plant = Plant::where('common_name', 'LIKE', '%' . $common_name . '%')->firstOrFail();
        return response()->json(
            $plant
        );
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Plant $plant)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Plant $plant): JsonResponse
    {
        $plant->delete();

        return response()->json([
            'message' => 'La plante a bien été supprimée'], 200
        );
    }


}
