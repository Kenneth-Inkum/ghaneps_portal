<?php

namespace App\Filament\Resources\EntityNameResource\Pages;

use App\Filament\Resources\EntityNameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEntityName extends EditRecord
{
    protected static string $resource = EntityNameResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
