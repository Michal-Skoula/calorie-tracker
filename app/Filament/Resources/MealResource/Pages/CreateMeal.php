<?php

namespace App\Filament\Resources\MealResource\Pages;

use App\Filament\Resources\MealResource;
use App\GetNutritionalDataFromOpenAI;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;
use OpenAI\Laravel\Facades\OpenAI;
use Storage;

class CreateMeal extends CreateRecord
{
    protected static string $resource = MealResource::class;

	public function form(Form $form): Form
	{
		return $form->schema($this->getFormSchema());
	}

	public function getFormSchema(): array
	{
		return [
			Select::make('day_id')
				->relationship('day','day')
				->required(),
			FileUpload::make('image')
				->disk('meals')
				->imageResizeTargetWidth(300)
				->required()
				->image(),
			Textarea::make('prompt')
				->maxLength(65535)
		];
	}

	protected function mutateFormDataBeforeCreate(array $data): array
	{
		$mime_type = Storage::disk('meals')->mimeType($data['image']);
		$base64 = base64_encode(Storage::disk('meals')->get($data['image']));

		$base64_image = 'data:' . $mime_type . ';base64,' . $base64;
		$prompt = $data['prompt'] ?? 'No additional information provided.';


		$request = new GetNutritionalDataFromOpenAI($base64_image, $prompt);
		$response = $request->getData();

		if(!$response['is_meal']) {
			throw ValidationException::withMessages([
				'info' => 'The provided image is not food.'
			]);
		}
		unset($response['is_meal']);


		return array_merge($data, $response);

	}
}

