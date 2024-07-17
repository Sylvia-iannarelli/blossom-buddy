<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $common_name
 * @property array $watering_general_benchmark
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $scientific_name
 * @property string|null $type
 * @property string|null $watering
 * @property array|null $sunlight
 * @property string|null $growth_rate
 * @property int|null $edible_fruit
 * @property int|null $poisonous_to_humans
 * @property int|null $poisonous_to_pets
 * @property string|null $description
 * @property string|null $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCommonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereEdibleFruit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereGrowthRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant wherePoisonousToHumans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant wherePoisonousToPets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereScientificName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereSunlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereWatering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereWateringGeneralBenchmark($value)
 */
	class Plant extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $plant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $city
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantUser whereUserId($value)
 */
	class PlantUser extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\PlantUser $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plant> $plants
 * @property-read int|null $plants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

