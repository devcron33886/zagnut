<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkResource\Pages;
use App\Models\Work;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WorkResource extends Resource
{
    protected static ?string $model = Work::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'names')
                    ->relationship('employee', 'id')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('bar_amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kitchen_amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('loss')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('paid_loss')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('remaining_loss')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('bonus')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('daily_total')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('payout')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.code')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bar_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kitchen_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('loss')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paid_loss')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('remaining_loss')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bonus')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('daily_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payout')
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageWorks::route('/'),
        ];
    }
}
