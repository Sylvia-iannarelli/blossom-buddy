<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plant extends Model
{
    use HasFactory;

    protected $casts = [
        'watering_general_benchmark' => 'array',
        'scientific_name' => 'array',
        'sunlight' => 'array'
    ];

    protected $fillable = [
        'api_id',
        'common_name',
        'watering_general_benchmark',
        "scientific_name",
        "type",
        "watering",
        "sunlight",
        "growth_rate",
        "edible_fruit",
        "poisonous_to_humans",
        "poisonous_to_pets",
        "description",
        "image_url"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
