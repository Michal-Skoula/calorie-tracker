<?php

namespace App\Models;

use App\FoodTypeEnum;
use App\Models\Scopes\GetCurrentUserMealsOnlyScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

//#[ScopedBy(GetCurrentUserMealsOnlyScope::class)]

class Meal extends Model
{
    use HasFactory;

	protected $casts = [
		'type' => FoodTypeEnum::class,
	];
	protected $guarded = [];

	public function day() : belongsTo
	{
		return $this->belongsTo(Day::class);
	}
}
