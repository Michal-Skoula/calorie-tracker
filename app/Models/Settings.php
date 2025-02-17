<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Settings extends Model
{

	protected $hidden = ['openai_api_key'];

	protected $guarded = [];

    public function user() : belongsTo
	{
		return $this->belongsTo(User::class);
	}
}
