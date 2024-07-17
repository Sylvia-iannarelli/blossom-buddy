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
            $plants,
            200
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

        $plantCommonName = $validated['common_name'];
        $plant = Plant::where('common_name', 'LIKE', "%$plantCommonName%")->firstOrFail();
        if (!$plant) {
            return response()->json(['error' => 'Plant not found'], 404);
        }
        $plant_id = $plant->id;

        $city = $validated['city'];

        $user->plants()->attach($plant_id, ['city' => $city]);

        return response()->json([
            'message' => 'La plante a bien été rattachée',
        ], 200);

    }

    /**
     * Remove the specified resource from the connected user.
     */
    public function deletePlantUser(Request $request, int $id): JsonResponse
    {
        /**
         * @var User $user
         */
        $user = $request->user();

        $relation = $user->plants()->wherePivot('id', $id)->first();
        if (!$relation) {
            return response()->json(['message' => 'La plante n\'est pas dans la liste de l\'utilisateur'], 404);
        }

        $user->plants()->wherePivot('id', $id)->detach();

        return response()->json([
            'message' => 'La plante a bien été détachée',
        ], 200);

    }

}
