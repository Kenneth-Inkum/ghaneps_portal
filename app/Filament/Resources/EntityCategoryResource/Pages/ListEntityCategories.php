<?php

namespace App\Filament\Resources\EntityCategoryResource\Pages;

use App\Filament\Resources\EntityCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntityCategories extends ListRecords
{
    protected static string $resource = EntityCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
