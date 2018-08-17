<?php

$key = getenv('PUSHER_APP_KEY') ?? env('PUSHER_APP_KEY');
$secret = getenv('PUSHER_APP_SECRET') ?? env('PUSHER_APP_SECRET');
$app_id = getenv('PUSHER_APP_ID') ?? env('PUSHER_APP_ID');
$cluster = getenv('PUSHER_APP_CLUSTER') ?? env('PUSHER_APP_CLUSTER');

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | This option controls the default broadcaster that will be used by the
    | framework when an event needs to be broadcast. You may set this to
    | any of the connections defined in the "connections" array below.
    |
    | Supported: "pusher", "redis", "log", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'pusher'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the broadcast connections that will be used
    | to broadcast events to other systems or over websockets. Samples of
    | each available type of connection are provided inside this array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => $key,
            'secret' => $secret,
            'app_id' => $app_id,
            'options' => [
                'cluster' => $cluster,
                'encrypted' => true,
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
