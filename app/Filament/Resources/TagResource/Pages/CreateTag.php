<?php

namespace App\Filament\Resources\TagResource\Pages;

use Filament\Actions;
use App\Filament\Resources\TagResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;

    protected  function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Creation de tag')
            ->body("Le tag a été créé avec succès");
    }
}
