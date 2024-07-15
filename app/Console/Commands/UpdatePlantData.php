<?php

namespace App\Console\Commands;

use App\Services\PerenualApiService;
use Illuminate\Console\Command;

class UpdatePlantData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-plant-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update plant data from Perenual API';

    protected $apiService;

    public function __construct(PerenualApiService $apiService)
    {
        parent::__construct();
        $this->apiService = $apiService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Mettre à jour 100 plantes par jour
        for ($i = 1; $i <= 100; $i++) {
            $this->apiService->integratePlantData($i);
            sleep(1); // Ajouter une pause pour éviter les problèmes de dépassement de taux de requêtes
        }
    }
}
