<?php

namespace App\Services;

use App\Models\Plant;
use Illuminate\Support\Facades\Http;

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
        }

        return null;
    }

    public function integratePlantData($id)
    {
        $data = $this->fetchPlantDetails($id);

        // dd($data);

        if ($data) {
            Plant::updateOrCreate(
                ['common_name' => $data['common_name']],
                [
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
