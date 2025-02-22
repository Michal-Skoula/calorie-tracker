<?php

namespace App;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasLabel;

enum BulkingOrCuttingEnum: string implements HasLabel
{
    case Bulking = 'bulking';
	case Cutting = 'cutting';

	public function getLabel(): ?string
	{
		return $this->name;
	}

	public function getColor(): array
	{
		return match ($this) {
			self::Bulking => Color::Red,
			self::Cutting => Color::Lime,
		};
	}

	public function getIcon():string
	{
		return match($this) {
			self::Bulking => 'heroicon-o-arrow-up-right',
			self::Cutting => 'heroicon-o-arrow-down-right'
		};
	}
}
