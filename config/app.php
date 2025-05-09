<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nom de l'application
    |--------------------------------------------------------------------------
    |
    | Cette valeur est le nom de votre application, qui sera utilisée lorsque
    | le framework devra afficher le nom de l'application dans une notification
    | ou d'autres éléments d'interface utilisateur.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Environnement de l'application
    |--------------------------------------------------------------------------
    |
    | Cette valeur détermine l'environnement dans lequel votre application
    | s'exécute actuellement. Cela peut influencer la configuration de divers
    | services que l'application utilise. Définissez cela dans votre fichier ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Mode debug de l'application
    |--------------------------------------------------------------------------
    |
    | Lorsque votre application est en mode debug, des messages d'erreur détaillés
    | avec des traces de pile seront affichés pour chaque erreur survenant dans
    | l'application. Si désactivé, une page d'erreur générique sera affichée.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL de l'application
    |--------------------------------------------------------------------------
    |
    | Cette URL est utilisée par la console pour générer correctement des URLs
    | lors de l'utilisation des outils en ligne de commande Artisan. Vous devez
    | la définir comme étant la racine de votre application.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Fuseau horaire de l'application
    |--------------------------------------------------------------------------
    |
    | Ici, vous pouvez spécifier le fuseau horaire par défaut de votre application,
    | qui sera utilisé par les fonctions date et date-time de PHP. Le fuseau horaire
    | par défaut est "UTC", ce qui convient à la plupart des cas.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Configuration de la langue de l'application
    |--------------------------------------------------------------------------
    |
    | La langue de l'application détermine la langue par défaut utilisée
    | par les méthodes de traduction/localisation de Laravel. Vous pouvez
    | définir cela sur n'importe quelle langue pour laquelle vous avez des traductions.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Clé de chiffrement
    |--------------------------------------------------------------------------
    |
    | Cette clé est utilisée par les services de chiffrement de Laravel et doit
    | être définie sur une chaîne aléatoire de 32 caractères pour garantir
    | la sécurité de toutes les valeurs chiffrées. Cela doit être fait avant
    | de déployer l'application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Pilote de mode maintenance
    |--------------------------------------------------------------------------
    |
    | Ces options de configuration déterminent le pilote utilisé pour définir et
    | gérer le statut de "mode maintenance" de Laravel. Le pilote "cache"
    | permet de contrôler le mode maintenance sur plusieurs machines.
    |
    | Pilotes supportés : "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
