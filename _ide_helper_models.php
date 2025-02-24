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
 * @property string $day
 * @property float|null $weight
 * @property int $calorie_goal
 * @property \App\BulkingOrCuttingEnum $bulking_or_cutting
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Meal> $meals
 * @property-read int|null $meals_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\DayFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day whereBulkingOrCutting($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day whereCalorieGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Day whereWeight($value)
 */
	class Day extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $day_id
 * @property string $image
 * @property string|null $prompt
 * @property string|null $name
 * @property string|null $description
 * @property int|null $calories
 * @property int|null $protein
 * @property int|null $carbs
 * @property int|null $fats
 * @property \App\FoodTypeEnum $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Day $day
 * @method static \Database\Factories\MealFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereCalories($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereCarbs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereDayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereFats($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal wherePrompt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereProtein($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Meal whereUpdatedAt($value)
 */
	class Meal extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $caloric_goal
 * @property int $protein_goal
 * @property int|null $carbs_goal
 * @property int|null $fats_goal
 * @property string $openai_api_key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereCaloricGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereCarbsGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereFatsGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereOpenaiApiKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereProteinGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereUserId($value)
 */
	class Settings extends \Eloquent {}
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Day> $days
 * @property-read int|null $days_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Settings|null $settings
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

