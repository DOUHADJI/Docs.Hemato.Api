<?php

namespace App\Filament\Resources\ThematicResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ThematicResource;

class CreateThematic extends CreateRecord
{
    protected static string $resource = ThematicResource::class;

    protected  function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Création de thématique')
            ->body("La création de la thématique a été effectuée avec succès");
    }
}
