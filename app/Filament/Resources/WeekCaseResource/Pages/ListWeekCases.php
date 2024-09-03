<?php

namespace App\Filament\Resources\WeekCaseResource\Pages;

use App\Filament\Resources\WeekCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWeekCases extends ListRecords
{
    protected static string $resource = WeekCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("+ Enregistrer un nouveau cas de la semaine"),
        ];
    }
}
