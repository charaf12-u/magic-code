<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Contact & Business Details
    |--------------------------------------------------------------------------
    |
    | Values loaded from .env for WhatsApp, direct phone, email, and location.
    |
    */

    'email' => env('CONTACT_EMAIL', 'hello@magic-code.ma'),
    'phone' => env('CONTACT_PHONE', '+212 6 00 00 00 00'),
    'whatsapp' => env('CONTACT_WHATSAPP', '212600000000'),
    'location' => env('CONTACT_LOCATION', 'Casablanca, Maroc · Remote mondial'),
];

