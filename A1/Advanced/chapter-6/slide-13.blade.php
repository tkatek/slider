<?php
$content = [

    'title'      => 'Practice 5: Listening',
    'subtitle'   => 'Listen to announcements (a-d )and complete the information',
    'row_heading' => 'Destinations',
    'audio'      => materialAsset('slider/A1/Advanced/chapter-6/audios/slide13.mp3'),
    'audio_transcript' => [
        'a. The 7.45 train to Edinburgh will leave from Platform 1. Platform 1 for the 7.45 to Edinburgh.',
        'b. The 7.49 service to York will depart from Platform 3.',
        'c. The train to Cambridge will depart from Platform 9 at 8.15. That\'s Platform 9 for the 8.15 service to Cambridge.',
        'd. The 7.50 intercity service to Liverpool Lime Street is delayed. This train will now leave at 8.10, from Platform 7.',
    ],


    'rows' => [
        [
            'key'   => 'edinburgh',
            'title' => 'Edinburgh',
            'emoji' => '🚆',
        ],
        [
            'key'   => 'york',
            'title' => 'York',
            'emoji' => '🚆',
        ],
        [
            'key'   => 'cambridge',
            'title' => 'Cambridge',
            'emoji' => '🚆',
        ],
        [
            'key'   => 'liverpool',
            'title' => 'Liverpool',
            'emoji' => '🚆',
        ],
    ],

    'columns' => [
        [
            'key'   => 'time',
            'title' => 'Time',
            'short' => 'Time',
        ],
        [
            'key'   => 'platform',
            'title' => 'Platform',
            'short' => 'Platform',
        ],
    ],

    'items' => [
        ['text' => '7.45', 'row' => 'edinburgh', 'column' => 'time',],
        ['text' => '1',    'row' => 'edinburgh', 'column' => 'platform'],

        ['text' => '7.49', 'row' => 'york',      'column' => 'time'],
        ['text' => '3',    'row' => 'york',      'column' => 'platform'],

        ['text' => '8.15', 'row' => 'cambridge', 'column' => 'time'],
        ['text' => '9',    'row' => 'cambridge', 'column' => 'platform'],

        ['text' => '8.10', 'row' => 'liverpool', 'column' => 'time'],
        ['text' => '7',    'row' => 'liverpool', 'column' => 'platform'],
    ],
];
?>

@include("slider.game.drag-and-drop-table", ['content' => $content])
