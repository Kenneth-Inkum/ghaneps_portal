<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntityCategoryResource\Pages;
use App\Filament\Resources\EntityCategoryResource\RelationManagers;
use App\Models\EntityCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntityCategoryResource extends Resource
{
    protected static ?string $model = EntityCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('entity_id')
                    ->relationship('entity', 'entity'),
                Forms\Components\TextInput::make('entity_category')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('entity_category')
                    ->label('Entity Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('entity.entity')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('dS M Y'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('dS M Y'),
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
            'index' => Pages\ListEntityCategories::route('/'),
            'create' => Pages\CreateEntityCategory::route('/create'),
            'edit' => Pages\EditEntityCategory::route('/{record}/edit'),
        ];
    }
}
