<?php

namespace App\Jobs;

use App\Services\PerenualApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatePlantsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $apiService;

    /**
     * Create a new job instance.
     */
    public function __construct(PerenualApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for ($i = 37; $i <= 40; $i++) {
            $this->apiService->integratePlantData($i);
            sleep(1); // Ajouter une pause pour éviter les problèmes de dépassement de taux de requêtes
        }
    }
}
