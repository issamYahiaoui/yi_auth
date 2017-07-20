<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1745360445764505',
        'client_secret' => '9c3cb93fc6cd6bf7ab24cd2d92a1bb32',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '1008168784896-nqookp0org8lcealao769bodh06tl3fq.apps.googleusercontent.com',
        'client_secret' => '1LtJVaTlXyZMPAcmXeFwsa00',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    'paypal' => [
        'client_id' => env('PAYPAL_KEY'),
        'client_secret' => env('PAYPAL_SECRET'),
        'redirect' => env('PAYPAL_REDIRECT_URI'),
    ],

];
