<?php

namespace App\Filament\Resources\ProcessResource\Pages;

use App\Filament\Resources\ProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcesses extends ListRecords
{
    protected static string $resource = ProcessResource::class;

    protected static ?string $title = 'Procédures';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("+ Enregistrer une nouvelle Procédure"),
        ];
    }
}
