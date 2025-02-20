<?php

namespace App\Models;

use App\FoodType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meal extends Model
{
    use HasFactory;

	protected $casts = [
		'type' => FoodType::class,
	];
	protected $guarded = [];

	public function day() : belongsTo
	{
		return $this->belongsTo(Day::class);
	}
}
