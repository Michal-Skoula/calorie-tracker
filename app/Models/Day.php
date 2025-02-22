<?php

namespace App\Models;

use App\BulkingOrCuttingEnum;
use App\Casts\WeightCast;
use App\Models\Scopes\GetCurrentUserDaysOnlyScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy(GetCurrentUserDaysOnlyScope::class)]

class Day extends Model
{
    use HasFactory;

	protected $casts = [
		'weight' => 'float',
		'bulking_or_cutting' => BulkingOrCuttingEnum::class,
	];

	protected $guarded = [];

	public function user() : belongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function meals() : HasMany
	{
		return $this->hasMany(Meal::class);
	}
}
