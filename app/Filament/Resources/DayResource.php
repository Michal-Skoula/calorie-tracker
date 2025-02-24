<?php

namespace App\Filament\Resources;

use App\BulkingOrCuttingEnum;
use App\Filament\Resources\DayResource\Pages;
use App\Filament\Resources\DayResource\RelationManagers;
use App\Models\Day;
use Auth;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DayResource extends Resource
{
    protected static ?string $model = Day::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';


    public static function form(Form $form): Form
    {
		$settings = Auth::user()->settings()->first();

		return $form
			->schema([
				Forms\Components\Hidden::make('user_id')
					->required()
					->default(Auth::id())
					->dehydrated(true),
				Forms\Components\DatePicker::make('day')
					->required()
					->default(today())
					->maxDate(today())
					->rules([
						fn (): Closure => function (string $attribute, $value, Closure $fail) {
							$date_formatted = Carbon::make($value)->format('d.m.Y');
							$day = Auth::user()->days()->where(['day' => $date_formatted])->get();

							if ($day->isNotEmpty()) {
								$fail("You've already made a record for this day.");
							}
						},
					]),
				Forms\Components\TextInput::make('weight')
					->numeric()
					->suffix('kg')
					->nullable(),
				Forms\Components\TextInput::make('calorie_goal')
					->required()
					->suffix('Kcal')
					->numeric()
					->default($settings->calorie_goal ?? 0),
				Forms\Components\Select::make('bulking_or_cutting')
					->required()
					->options(BulkingOrCuttingEnum::class)
					->default($settings->bulking_or_cutting ?? 'cutting'),
			]);
	}

    public static function table(Table $table): Table
    {
		$settings = Auth::user()->settings()->first();

		return $table
			->defaultSort('day','desc')
            ->columns([
				Tables\Columns\TextColumn::make('day')
					->date('d.m.Y')
					->sortable(),
				Tables\Columns\ViewColumn::make('calories')
					->counts('meals')
					->view('filament.calories-column'),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
					->suffix(' kg'),
				Tables\Columns\TextColumn::make('meals_count')
					->numeric()
					->counts('meals'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }



    public static function getRelations(): array
    {
        return [
            RelationManagers\MealsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDays::route('/'),
            'create' => Pages\CreateDay::route('/create'),
            'edit' => Pages\EditDay::route('/{record}/edit'),
        ];
    }
}
