<?php

namespace App;

use App\Models\User;

trait GetUserDirectoryName
{
    public static function fileName($user_id): string
	{
		return $user_id . '-' . User::find($user_id)->name;
	}
}
