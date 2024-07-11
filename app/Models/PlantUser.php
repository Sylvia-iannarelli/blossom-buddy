<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PlantUser extends Pivot
{
    protected $fillable = [
        'city'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id',
        'plant_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $visible = [
        'id',
        'city',
        'created_at',
        'updated_at'
    ];

}
