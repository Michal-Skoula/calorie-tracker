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
 * @property int $user_id
 * @property string $food_name
 * @property int $calories
 * @property int $carbs
 * @property int $sugar
 * @property int $protein
 * @property int $fiber
 * @property int $fats
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereCalories($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereCarbs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereFats($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereFiber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereFoodName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereProtein($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereSugar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereUserId($value)
 */
	class NutritionData extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NutritionData> $nutritionalData
 * @property-read int|null $nutritional_data_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

