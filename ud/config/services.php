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
        'client_id' => '444581195531-kic0mgg7tv69easi6938abcdab7scrb2.apps.googleusercontent.com', //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM Google DEVELOPER ACCOUNT
        'redirect' => 'https://mobile.primedata.com.ng/google/callback/'
    ],
    'facebook' => [
        'client_id' => '656120242615409', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '51fb0de9e0502f82b6699bd7984a83db', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://mobile.primedata.com.ng/facebook/callback/'
    ],

];
