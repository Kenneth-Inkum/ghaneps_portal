<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\EntityName;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Buildix\Timex\Models\Event;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EntityNameResource\Pages;
use App\Filament\Resources\EntityNameResource\RelationManagers;

class EntityNameResource extends Resource
{
    protected static ?string $model = EntityName::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Select::make('entity_category_id')
                                    ->relationship('entityCategory', 'entity_category')
                                    ->label('Entity Category'),
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->label('Team Leader'),
                                Forms\Components\TextInput::make('entity_name')
                                    ->required()
                                    ->maxLength(255),
                            ])->columns(['sm' => 2]),

                        Forms\Components\Section::make('Training Participants')
                            ->description('Registrer all training participants from your entity here.')
                            // ->aside()
                            ->collapsible()
                            ->schema([
                                Forms\Components\Repeater::make('Participant')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\Select::make('entity_name_id')
                                            ->options(EntityName::query()->pluck('entity_name', 'id'))
                                            ->label('Entity Name'),

                                        Forms\Components\TextInput::make('firstname'),
                                        Forms\Components\TextInput::make('lastname'),
                                        Forms\Components\TextInput::make('phone'),
                                        Forms\Components\TextInput::make('whatsapp'),
                                        Forms\Components\TextInput::make('email'),
                                        Forms\Components\Select::make('session')
                                        ->options(Event::query()->pluck('subject')),

                                        // entity_name_id
                                        // firstname
                                        // lastname
                                        // phone
                                        // whatsapp_number
                                        // email
                                        // session

                                    ])->columns(['sm' => 2]),

                            ])->compact(),


                    ])->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('entityCategory.entity.entity')
                //     ->sortable()
                //     ->searchable(),
                Tables\Columns\TextColumn::make('entity_name')
                    ->label('Entity Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('entityCategory.entity_category')
                    ->label('Entity Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Team Leader')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('dS M Y')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('dS M Y'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime('dS M Y'),
            ])
            ->filters([
                TrashedFilter::make(),
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
            'index' => Pages\ListEntityNames::route('/'),
            'create' => Pages\CreateEntityName::route('/create'),
            'edit' => Pages\EditEntityName::route('/{record}/edit'),
        ];
    }
}
