<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $food_name
 * @property int $calories
 * @property int $sugars
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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereFats($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereFiber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereFoodName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereProtein($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereSugars($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NutritionData whereUserId($value)
 * @mixin \Eloquent
 */
class NutritionData extends Model
{
	protected $fillable = ['user_id','food_name', 'calories', 'carbs', 'sugar', 'protein', 'fats', 'fiber'];

    public function user() : belongsTo {
		return $this->belongsTo(User::class);
	}
}
