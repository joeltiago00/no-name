<?php

return [
    'bucket' => [
        'no-name-dev' => [
            'bucket' => env('AWS_BUCKET'),
            'config' => [
                'version' => 'latest',
                'region' => env('AWS_BUCKET_DEFAULT_REGION'),
                'credentials' => [
                    'key' => env('AWS_BUCKET_ACCESS_KEY_ID'),
                    'secret' => env('AWS_BUCKET_SECRET_ACCESS_KEY')
                ]
            ]
        ]
    ]
];
