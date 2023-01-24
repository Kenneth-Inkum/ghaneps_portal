<?php

namespace App\Filament\Resources\EntityCategoryResource\Pages;

use App\Filament\Resources\EntityCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEntityCategory extends EditRecord
{
    protected static string $resource = EntityCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
