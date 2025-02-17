<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DayResource\Pages;
use App\Filament\Resources\DayResource\RelationManagers;
use App\Models\Day;
use Auth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DayResource extends Resource
{
    protected static ?string $model = Day::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				Forms\Components\DatePicker::make('updated_at')
					->required()
					->label('Day')
					->default(today())
					->format('d.m.Y'),
                Forms\Components\TextInput::make('calorie_goal')
                    ->required()
                    ->numeric()
					->default(Auth::user()->settings()->first()->caloric_goal ?? 0),
				Forms\Components\Select::make('user_id')
					->relationship('user', 'id', function (Builder $query) {
						$query->find(Auth::id());
					})
					->default(Auth::id())
//					->hidden()
					->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
				Tables\Columns\TextColumn::make('updated_at')
					->date('d.m.Y')
					->label('Date'),
                Tables\Columns\TextColumn::make('calorie_goal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('calories')
                    ->numeric()
                    ->sortable(),
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

	/**
	 * Override the default query so that the only accessible days and meals are from the current authenticated user
	 *
	 * @return Builder
	 */
	public static function getEloquentQuery(): Builder
	{
		$user_id = Auth::id();
		return Day::query()->where('user_id', $user_id);
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
