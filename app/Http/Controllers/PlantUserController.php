<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlantUserController extends Controller
{
    /**
     * Get plants of the connected user.
     */
    public function getPlantUser(Request $request): JsonResponse
    {
        /**
         * @var User $user
         */
        $user = $request->user();
        $plants = $user->plants;

        return response()->json(
            $plants
        );
    }

    /**
     * Add plant to the connected user.
     */
    public function addPlantUser(Request $request): JsonResponse
    {

        $validated = $request->validate([
            'common_name' => 'required|string',
            'city' => 'required|string'
        ]);

        /**
         * @var User $user
         */
        $user = $request->user();
        $user_id = $user->id;

        $plantCommonName = $validated['common_name'];
        $plant = Plant::where('common_name', 'like', "%$plantCommonName%")->get()->firstOrFail();
        if (!$plant) {
            return response()->json(['error' => 'Plant not found'], 404);
        }
        $plant_id = $plant->id;

        $city = $validated['city'];

        $user->plants()->attach($plant_id, ['city' => $city]);

        return response()->json([
            'message' => 'La plante a bien été rattachée',
        ]);

    }

    /**
     * Remove the specified resource from the connected user.
     */
    public function deletePlantUser(Request $request, Plant $plant): JsonResponse
    {
        /**
         * @var User $user
         */
        $user = $request->user();

        $user->plants()->detach($plant);

        return response()->json([
            'message' => 'La plante a bien été détachée',
        ]);

    }

}
