<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantRequest;
use App\Jobs\UpdatePlantsJob;
use App\Models\Plant;
use App\Services\PerenualApiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    protected $apiService;

    public function __construct(PerenualApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Update listing via API.
     */
    public function update()
    {
        // Dispatcher le job de mise à jour des plantes
        UpdatePlantsJob::dispatch($this->apiService);
        return response()->json(['status' => 'Update job dispatched']);
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
            $plant
        );
    }

    /**
     * Edit the specified resource.
     */
    public function read(Plant $plant): JsonResponse
    {
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
            'message' => 'La plante a bien été supprimée',
        ]);
    }


}
