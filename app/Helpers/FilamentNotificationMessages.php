<?php

namespace App\Helpers;


class FilamentNotificationMessages {

    public static function successEditNotification() : string
    {
        return "Les modifications ont été enregistrées avec succès";
    }

    public static function successDeleteNotification() : string
    {
        return "L'élément a été supprimé avec succès";
    }
}
