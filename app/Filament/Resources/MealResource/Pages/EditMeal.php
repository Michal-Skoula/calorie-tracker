<?php

namespace App\Filament\Resources\MealResource\Pages;

use App\Filament\Resources\MealResource;
use App\FoodTypeEnum;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditMeal extends EditRecord
{
    protected static string $resource = MealResource::class;

	public function form(Form $form): Form
	{
		return $form->schema($this->getFormSchema());
	}

	protected function getFormSchema(): array
	{
		return [
			FileUpload::make('image')
				->disk('meals')
				->disabled(),
			TextInput::make('name')
				->required(),
			Textarea::make('description'),
			Select::make('type')
				->required()
				->options(FoodTypeEnum::class),
			TextInput::make('calories')
				->numeric()
				->minValue(0)
				->required(),
			TextInput::make('protein')
				->numeric()
				->minValue(0)
				->required(),
			TextInput::make('carbs')
				->numeric()
				->minValue(0)
				->required(),
			TextInput::make('fats')
				->numeric()
				->minValue(0)
				->required(),
		];
	}

	protected function getHeaderActions(): array
	{
		return [
			Actions\DeleteAction::make(),
		];
	}
}
