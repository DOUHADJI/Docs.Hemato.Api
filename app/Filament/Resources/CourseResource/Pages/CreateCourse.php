<?php

namespace App\Filament\Resources\CourseResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\CourseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;

    protected  function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Création du cours')
            ->body("La création du cours a été effectuée avec succès");
    }
}
