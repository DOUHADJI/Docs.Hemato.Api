<?php

namespace App\Filament\Resources\ProcessResource\Pages;

use Filament\Actions;
use App\Models\Process;
use Illuminate\Support\Str;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProcessResource;

class CreateProcess extends CreateRecord
{
    protected static string $resource = ProcessResource::class;

    protected  function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title('Création de Procédure enregistré')
            ->body("La création de la procédure a été effectuée avec succès");
    }

    public function save()
    {
        try {
            $data = $this->form->getState();
            $model = new Process();
            $model->title = $data["title"];
            $model->slug = Str::slug($data["title"]);
            $model->content = $data["content"];
        } catch (Halt $exception) {

            Notification::make()
                ->error()
                ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
                ->send();

            return;
        }

        Notification::make()
            ->success()
            ->title("Notre association")
            ->body("Informations générales enregistrées avec succes")
            ->send();
    }
}
