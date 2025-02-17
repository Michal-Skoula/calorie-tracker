<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Day extends Model
{
    use HasFactory;

	protected $guarded = [];

	public function user() : belongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function meals() : hasMany
	{
		return $this->hasMany(Meal::class);
	}

	public function calories() : int
	{
		$total_calories = 0;
		$meals = $this->meals;

		if(!$meals) {
			return 0;
		}

		foreach($meals as $meal) {
			$total_calories += $meal->calories;
		}

		return $total_calories;
	}
}
