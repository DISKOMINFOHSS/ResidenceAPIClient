<?php

return [
    /**
     * API KEY
     */
    'key'      => env('RESIDENCE_KEY'),

    /**
     * RESIDENCE_ORIGIN
     */
    'origin'   => env('RESIDENCE_ORIGIN', parse_url(config('app.url'), PHP_URL_HOST)),

    /**
     * RESIDENCE_ENDPOINT
     */
    'endpoint' => env('RESIDENCE_ENDPOINT'),
];
