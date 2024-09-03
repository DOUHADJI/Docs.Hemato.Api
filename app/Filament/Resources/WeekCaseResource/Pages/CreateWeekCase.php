<?php

namespace App\Filament\Resources\WeekCaseResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\WeekCaseResource;

class CreateWeekCase extends CreateRecord
{
    protected static string $resource = WeekCaseResource::class;

    protected  function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Création du cas de la semaine')
            ->body("La création du cas de la semaine a été effectuée avec succès");
    }
}
