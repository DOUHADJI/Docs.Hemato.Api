<?php

namespace App\Filament\Resources\ThematicResource\Pages;

use App\Filament\Resources\ThematicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThematics extends ListRecords
{
    protected static string $resource = ThematicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("+ Créer une nouvelle thématique de cours"),
        ];
    }
}
