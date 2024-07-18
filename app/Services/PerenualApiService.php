<?php

namespace App\Services;

use App\Models\Plant;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PerenualApiService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('PERENUAL_API_KEY');
        $this->baseUrl = 'https://perenual.com/api/species/details/';
    }

    public function fetchPlantDetails($id)
    {
        $response = Http::get($this->baseUrl . $id, [
            'key' => $this->apiKey
        ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            Log::error("Failed to fetch plant with ID {$id}: " . $response->body());
        }
    }

    public function integratePlantData()
    {
        // Mettre à jour 100 plantes par jour
        for ($id = 1; $id <=3; $id++) {

            $data = $this->fetchPlantDetails($id);

            // dd($data);

            if ($data) {
                Plant::updateOrCreate(
                    ['api_id' => $data['id']],
                    [
                        'common_name' => $data['common_name'],
                        'watering_general_benchmark' => $data['watering_general_benchmark'],
                        'scientific_name' => $data['scientific_name'] ?? null,
                        'type' => $data['type'] ?? null,
                        'watering' => $data['watering'] ?? null,
                        'sunlight' => $data['sunlight'] ?? null,
                        'growth_rate' => $data['growth_rate'] ?? null,
                        'edible_fruit' => $data['edible_fruit'] ?? null,
                        'poisonous_to_humans' => $data['poisonous_to_humans'] ?? null,
                        'poisonous_to_pets' => $data['poisonous_to_pets'] ?? null,
                        'description' => $data['description'] ?? null,
                        'image_url' => $data['default_image']['original_url'] ?? null,
                    ]
                );
            }
        }
    }
}
