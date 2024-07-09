<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $casts = [
        'watering_general_benchmark' => 'array'
    ];

    protected $fillable = [
        'common_name',
        'watering_general_benchmark'
    ];

}
