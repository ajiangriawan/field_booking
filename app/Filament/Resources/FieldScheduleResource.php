<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FieldScheduleResource\Pages;
use App\Filament\Resources\FieldScheduleResource\RelationManagers;
use App\Models\FieldSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FieldScheduleResource extends Resource
{
    protected static ?string $model = FieldSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Field Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('field_id')
                    ->relationship('field', 'name') // pastikan relasi field() ada di model FieldSchedule
                    ->required(),

                Forms\Components\MultiSelect::make('day_of_week')
                    ->options([
                        'monday' => 'Monday',
                        'tuesday' => 'Tuesday',
                        'wednesday' => 'Wednesday',
                        'thursday' => 'Thursday',
                        'friday' => 'Friday',
                        'saturday' => 'Saturday',
                        'sunday' => 'Sunday',
                    ])
                    ->required()
                    ->minItems(1),

                Forms\Components\TimePicker::make('start_time')
                    ->required(),

                Forms\Components\TimePicker::make('end_time')
                    ->required(),

                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->minValue(0),

                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('field.name')->label('Field'),
                Tables\Columns\TextColumn::make('day_of_week')->label('Day'),
                Tables\Columns\TextColumn::make('start_time')->label('Start Time')->time(),
                Tables\Columns\TextColumn::make('end_time')->label('End Time')->time(),
                Tables\Columns\TextColumn::make('price')->money('idr', true),
                Tables\Columns\BooleanColumn::make('is_active')->label('Active'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFieldSchedules::route('/'),
            'create' => Pages\CreateFieldSchedule::route('/create'),
            'edit' => Pages\EditFieldSchedule::route('/{record}/edit'),
        ];
    }
}
