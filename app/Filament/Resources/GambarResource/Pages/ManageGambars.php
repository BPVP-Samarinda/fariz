<?php

namespace App\Filament\Resources\GambarResource\Pages;

use App\Filament\Resources\GambarResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGambars extends ManageRecords
{
    protected static string $resource = GambarResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
