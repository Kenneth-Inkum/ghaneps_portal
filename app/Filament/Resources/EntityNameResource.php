<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntityNameResource\Pages;
use App\Filament\Resources\EntityNameResource\RelationManagers;
use App\Models\EntityName;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntityNameResource extends Resource
{
    protected static ?string $model = EntityName::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('entity_category_id')
                    ->relationship('entityCategory', 'entity_category'),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name'),
                Forms\Components\TextInput::make('entity_name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('entityCategory.id'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('entity_name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('dS M Y'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('dS M Y'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime('dS M Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListEntityNames::route('/'),
            'create' => Pages\CreateEntityName::route('/create'),
            'edit' => Pages\EditEntityName::route('/{record}/edit'),
        ];
    }
}
