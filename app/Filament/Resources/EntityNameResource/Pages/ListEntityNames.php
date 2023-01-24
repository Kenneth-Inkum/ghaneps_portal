<?php

namespace App\Filament\Resources\EntityNameResource\Pages;

use App\Filament\Resources\EntityNameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntityNames extends ListRecords
{
    protected static string $resource = EntityNameResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
