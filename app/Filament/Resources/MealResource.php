<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MealResource\Pages;
use App\Filament\Resources\MealResource\RelationManagers;
use App\Models\Day;
use App\Models\Meal;
use Auth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MealResource extends Resource
{
    protected static ?string $model = Meal::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('day_id')
                    ->required()
                    ->relationship('day','updated_at'),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('calories')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('protein')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('carbs')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('fats')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('calories')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('protein')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('carbs')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fats')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            //
        ];
    }

	public static function getEloquentQuery(): Builder
	{
		return Meal::whereHas('day', function ($query) {
			$query->where('user_id', Auth::id());
		});
	}
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMeals::route('/'),
            'create' => Pages\CreateMeal::route('/create'),
            'edit' => Pages\EditMeal::route('/{record}/edit'),
        ];
    }
}
