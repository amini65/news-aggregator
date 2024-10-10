<?php

return [

    'NewsApi' => [
        'url' => env('NEWSAPI_URL','https://newsapi.org/v2/everything'),
        'token' => env('NEWSAPI_TOKEN','ff69e6f46bc94370b5962b12e821ca5e'),
    ],

    'Guardian' => [
        'url' => env('GUARDIAN_URL','https://content.guardianapis.com/search'),
        'token' => env('GUARDIAN_TOKEN','test'),
    ],

];
