<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Valeurs par défaut pour l'authentification
    |--------------------------------------------------------------------------
    |
    | Cette option définit la "garde" (guard) d'authentification par défaut et
    | le "broker" pour la réinitialisation de mot de passe. Tu peux modifier
    | ces valeurs si nécessaire, mais elles conviennent à la majorité des cas.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Gardes d'authentification
    |--------------------------------------------------------------------------
    |
    | Tu peux définir ici les différentes gardes d'authentification pour ton
    | application. Une configuration par défaut est déjà fournie utilisant
    | le stockage en session et le provider "users" avec Eloquent.
    |
    | Chaque garde a un provider qui détermine comment les utilisateurs sont
    | récupérés depuis la base de données ou un autre système de stockage.
    |
    | Supporté : "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Providers d'utilisateurs
    |--------------------------------------------------------------------------
    |
    | Chaque garde a un provider qui définit comment les utilisateurs sont
    | récupérés. En général, Eloquent est utilisé avec un modèle User.
    |
    | Si tu as plusieurs tables ou modèles d’utilisateurs, tu peux définir
    | plusieurs providers, puis les assigner à différentes gardes.
    |
    | Supporté : "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // Exemple pour utiliser le driver "database" :
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Réinitialisation des mots de passe
    |--------------------------------------------------------------------------
    |
    | Ces options configurent le fonctionnement de la réinitialisation de mot
    | de passe dans Laravel : la table des tokens, le provider à utiliser,
    | la durée de validité des tokens et la fréquence autorisée.
    |
    | - "expire" : durée (en minutes) pendant laquelle un token reste valide.
    | - "throttle" : délai (en secondes) entre deux demandes de réinitialisation.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Délai d’expiration de la confirmation du mot de passe
    |--------------------------------------------------------------------------
    |
    | Détermine combien de temps (en secondes) une confirmation de mot de
    | passe reste valide avant que l'utilisateur doive la ressaisir.
    | Par défaut, cela dure 3 heures (10800 secondes).
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
