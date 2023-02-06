<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Entity;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\EntityResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EntityResource\RelationManagers;
use App\Filament\Resources\EntityResource\RelationManagers\ParticipantRelationManager;
use Buildix\Timex\Models\Event;
use Buildix\Timex\Resources\EventResource;

class EntityResource extends Resource
{
    protected static ?string $model = Entity::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Registration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('entity_name')
                    ->required()
                    ->label('Entity Name')
                    ->maxLength(255),
                Forms\Components\Select::make('entity_type')
                    ->required()
                    ->label('Entity Type')
                    ->options([
                        'Governmental Institution' => 'Governmental Institution',
                        'Private Institution' => 'Private Institution',
                    ]),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Team Leader'),
                Forms\Components\Select::make('timex_event_id')
                    ->relationship('timexEvent', 'subject')
                    ->label('Preferred Session'),
                Forms\Components\Select::make('participants')
                    ->label(trans('timex::timex.event.participants'))
                    ->options(function () {
                        return EventResource::getUserModel()::all()
                        ->pluck(EventResource::getUserModelColumn('name'),EventResource::getUserModelColumn('id'));
                    })
                    ->multiple()->columnSpanFull()->hidden(!in_array('participants',\Schema::getColumnListing(EventResource::getEventTableName()))),


                // Forms\Components\Group::make()
                // ->schema([
                //     Forms\Components\Card::make()
                //         ->schema([
                //             // Forms\Components\Select::make('entity_category_id')
                //             //     ->relationship('entityCategory', 'entity_category')
                //             //     ->label('Entity Category'),
                //             // Forms\Components\Select::make('user_id')
                //             //     ->relationship('user', 'name')
                //             //     ->label('Team Leader'),
                //             Forms\Components\TextInput::make('entity_name')
                //                 ->required()
                //                 ->maxLength(255),
                //         ])->columns(['sm' => 2]),

                //     Forms\Components\Section::make('Training Participants')
                //         ->description('Registrer all training participants from your entity here.')
                //         // ->aside()
                //         ->collapsible()
                //         ->schema([
                //             Forms\Components\Repeater::make('Participant')
                //                 ->relationship()
                //                 ->schema([
                //                     // Forms\Components\Select::make('entity_name_id')
                //                     //     ->options(EntityName::query()->pluck('entity_name', 'id'))
                //                     //     ->label('Entity Name'),

                //                     Forms\Components\TextInput::make('firstname'),
                //                     Forms\Components\TextInput::make('lastname'),
                //                     Forms\Components\TextInput::make('phone'),
                //                     Forms\Components\TextInput::make('whatsapp'),
                //                     Forms\Components\TextInput::make('email'),
                //                     // Forms\Components\Select::make('session')
                //                     // ->options(Event::query()->pluck('subject')),

                //                     // entity_name_id
                //                     // firstname
                //                     // lastname
                //                     // phone
                //                     // whatsapp_number
                //                     // email
                //                     // session

                //                 ])->columns(['sm' => 2]),

                //         ])->compact(),


                // ])->columnSpan('full')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('entity_name')
                    ->label('Entity Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('entity_type')
                    ->label('Entity Type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Team Leader')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('timexEvent.subject')
                    ->label('Preferred Session')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('dS M Y'),
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
            ParticipantRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEntities::route('/'),
            'create' => Pages\CreateEntity::route('/create'),
            'edit' => Pages\EditEntity::route('/{record}/edit'),
        ];
    }
}
