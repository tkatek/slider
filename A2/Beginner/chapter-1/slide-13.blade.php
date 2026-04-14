<?php
$content = [

    'title'           => 'Practice 4',
    'subtitle'        => 'Listen again and complete the table.',
    'row_heading'     => 'City',
    'audio'           => materialAsset('slider/A2/Beginner/chapter-1/audios/slide12.mp3'),


    'audio_transcript' => [
        'And here is today’s weather forecast for the international traveler. Let’s start with Beijing. It will be a cold day in Beijing today, and windy. The low will be zero and the high will be 6 degrees.',
        'Mexico City will be warm and wet, with a low of 23 degrees Centigrade and a high of 28.',
        'Tokyo is expecting cloudy weather with heavy rain. The low will be 4 degrees and the high 12.',
        'New York is going to have a windy day. It will be very cold with a low of minus 10 and a high of zero.',
        'In Taipei it will be cloudy, wet, and hot today. The low will be 20 degrees and the high will be 30.',
    ],

    'rows' => [
        [
            'key'   => 'beijing',
            'title' => 'Beijing',
            'emoji' => '🌤️',
        ],
        [
            'key'   => 'mexico_city',
            'title' => 'Mexico City',
            'emoji' => '🌦️',
        ],
        [
            'key'   => 'tokyo',
            'title' => 'Tokyo',
            'emoji' => '🌧️',
        ],
        [
            'key'   => 'new_york',
            'title' => 'New York',
            'emoji' => '🌬️',
        ],
        [
            'key'   => 'taipei',
            'title' => 'Taipei',
            'emoji' => '☁️',
        ],
    ],

    'columns' => [
        [
            'key'   => 'low',
            'title' => 'Low',
            'short' => 'Low',
        ],
        [
            'key'   => 'high',
            'title' => 'High',
            'short' => 'High',
        ],
    ],

    'items' => [
        ['text' => '0°',   'row' => 'beijing',     'column' => 'low'],
        ['text' => '6°',   'row' => 'beijing',     'column' => 'high'],

        ['text' => '23°',  'row' => 'mexico_city', 'column' => 'low'],
        ['text' => '28°',  'row' => 'mexico_city', 'column' => 'high'],

        ['text' => '4°',   'row' => 'tokyo',       'column' => 'low'],
        ['text' => '12°',  'row' => 'tokyo',       'column' => 'high'],

        ['text' => '-10°', 'row' => 'new_york',    'column' => 'low'],
        ['text' => '0°',   'row' => 'new_york',    'column' => 'high'],

        ['text' => '20°',  'row' => 'taipei',      'column' => 'low'],
        ['text' => '30°',  'row' => 'taipei',      'column' => 'high'],
    ],
];
?>

@include("slider.game.drag-and-drop-table", ['content' => $content])