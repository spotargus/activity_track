<?php


return [
    'models' => [
        'activity_track' => \ElfR\ActivityTrack\Models\ActivityTrack::class
    ],
    'table_names' => [
        'activity_tracks' => 'activity_tracks'
    ],
    'column_names' => [
        'activity_tracks' => [
            'id' => 'id',
            'model_key' => 'trackable_id',
            'model_type' => 'trackable_type',
            'tracking_type' => 'tracking_type'
        ],
    ]
];