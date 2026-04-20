<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Show install button on all pages
    |--------------------------------------------------------------------------
    */
    'install-button' => true,

    /*
    |--------------------------------------------------------------------------
    | PWA Manifest Configuration
    |--------------------------------------------------------------------------
    | Run this command to regenerate manifest after edits:
    | php artisan erag:update-manifest
    */
    'manifest' => [
        'name' => 'Global Sure Finance',
        'short_name' => 'GSF',
        'description' => 'A progressive investment and trading space.',
        'background_color' => '#ffffff',
        'theme_color' => '#6777ef',
        'display' => 'standalone',
        'start_url' => '/',
        'scope' => '/',
        'orientation' => 'portrait-primary',

        'icons' => [
            // ✅ iOS-compatible icon (must be root-level, which yours now is)
            [
                'src' => '/apple-touch-icon.png',
                'sizes' => '180x180',
                'type' => 'image/png',
                'purpose' => 'any maskable',
            ],

            // ✅ Android Chrome standard icons
            [
                'src' => '/logo-192x192.png',
                'sizes' => '192x192',
                'type' => 'image/png',
                'purpose' => 'any maskable',
            ],
            [
                'src' => '/logo-512x512.png',
                'sizes' => '512x512',
                'type' => 'image/png',
                'purpose' => 'any maskable',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug Mode
    |--------------------------------------------------------------------------
    */
    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Livewire Support
    |--------------------------------------------------------------------------
    */
    'livewire-app' => true,
];
