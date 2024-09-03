<?php

namespace App\Filament\Resources\StepResource\Pages;

use App\Filament\Resources\StepResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStep extends EditRecord
{
    protected static string $resource = StepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
