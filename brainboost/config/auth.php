<?php

return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'usuarios', // Specify the user provider for the 'web' guard
        ],
        'usuarios' => [
            'driver' => 'session',
            'provider' => 'usuarios', // Specify the user provider for the 'usuarios' guard
        ],
    ],
    'providers' => [
        'usuarios' => [
            'driver' => 'eloquent',
            'model' => App\Models\Usuario::class, // Specify the User model for the 'usuarios' provider
        ],
    ],
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'password_timeout' => 10800,
];
