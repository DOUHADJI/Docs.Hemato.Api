<?php

namespace App\Filament\Resources\WeekCaseResource\Pages;

use App\Filament\Resources\WeekCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeekCase extends EditRecord
{
    protected static string $resource = WeekCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
