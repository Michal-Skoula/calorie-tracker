<?php

namespace App;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasLabel;

enum FoodTypeEnum: string implements HasLabel
{
    case Breakfast =  'breakfast';
	case Lunch = 'lunch';
	case Dinner = 'dinner';
	case Snack = 'snack';
	case Unknown = 'unknown';

	public function getLabel(): ?string
	{
		return $this->name;
	}

	public function getColor(): array
	{
		return match($this) {
			self::Breakfast => Color::Teal,
			self::Lunch => Color::Amber,
			self::Dinner => Color::Emerald,
			self::Snack => Color::Fuchsia,
			self::Unknown => Color::Gray,
		};
	}

	public function getDescription(): string
	{
		return match ($this) {
			self::Breakfast => 'Meals classified as breakfast',
			self::Lunch => 'Meals classified as lunch',
			self::Dinner => 'Meals classified as dinner',
			self::Snack => 'Meals classified as snacks',
			self::Unknown => 'Unknown type of meal',
		};
	}
}
