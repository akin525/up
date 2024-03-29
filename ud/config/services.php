<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => env('google_id'), //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => env('google_sec'), //USE FROM Google DEVELOPER ACCOUNT
        'redirect' => env('google_re')
    ],
    'facebook' => [
        'client_id' => env('facebook_id'), //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => env('facebook_sec'), //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => env('facebook_re')
    ],

];
