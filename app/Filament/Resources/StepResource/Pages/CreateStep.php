<?php

namespace App\Filament\Resources\StepResource\Pages;

use Filament\Actions;
use App\Filament\Resources\StepResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateStep extends CreateRecord
{
    protected static string $resource = StepResource::class;

    protected  function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Création de Etape analytique')
            ->body("La création de l'étape analytique a été effectuée avec succès");
    }
}
