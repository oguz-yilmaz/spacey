<?php
$started = \App\Models\JobPost::STATUS_STARTED;
$contracted = \App\Models\JobPost::STATUS_CONTRACTED;
$drafted = \App\Models\JobPost::STATUS_DRAFTED;
$canceled = \App\Models\JobPost::STATUS_CANCELED;
$posted = \App\Models\JobPost::STATUS_POSTED;
$requestAccepted = \App\Models\JobPost::STATUS_REQUEST_ACCEPTED;
$proposed = \App\Models\JobPost::STATUS_PROPOSED;
$closed = \App\Models\JobPost::STATUS_CLOSED;

return [
    'statuses' => [
        $started => [
            'actions' => [
                'create' => [$drafted, \App\Models\Client::class]
            ],
        ],
        $contracted => [
            'actions' => [],
        ],
        $drafted => [
            'actions' => [
                'post' => [$posted, \App\Models\Client::class],
                'cancel' => [$canceled, \App\Models\Client::class],
            ],
        ],
        $canceled => [
            'actions' => [],
        ],
        $posted => [
            'actions' => [
                'retract' => [$drafted, \App\Models\Client::class],
                'acceptRequest' => [$requestAccepted, \App\Models\Provider::class],
            ]
        ],
        $requestAccepted => [
            'actions' => [
                'propose' => [$proposed, \App\Models\Provider::class],
            ]
        ],
        $proposed => [
            'actions' => [
                'accept' => [$contracted, \App\Models\Provider::class],
                'reject' => [$posted, \App\Models\Provider::class],
            ]
        ],
        $closed => [
            'statuses' => [],
        ],
    ],
    'issuers' => [
        1 => \App\Models\Provider::class,
        2 => \App\Models\Client::class,
    ]
];
