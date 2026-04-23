<?php
$content = [
    'mode' => 'choice_table',
    'page_title' => 'Listening: Practice 3',
    'title' => 'Listening: Practice 3',
    'subtitle' => '',
    'instruction' => 'Listen to these weather reports and check the weather for each city.',
    'instruction_note' => '',
    'audio' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide12.mp3'),

    'transcript' => [
        'And here is today’s weather forecast for the international traveler. Let’s start with Beijing. It will be a cold day in Beijing today, and windy. The low will be zero and the high will be 6 degrees.',
        'Mexico City will be warm and wet, with a low of 23 degrees Centigrade and a high of 28.',
        'Tokyo is expecting cloudy weather with heavy rain. The low will be 4 degrees.',
        'New York is going to have a windy day. It will be very cold with a low of minus 10 and a high of zero.',
        'In Taipei it will be cloudy, wet, and hot today. The low will be 20 degrees and the high will be 30.',
    ],

    'row_heading' => 'City',
    'option_heading' => 'Weather',

    'rows' => [
        [
            'number' => 1,
            'item' => 'Beijing',
            'correct' => ['cold', 'windy'],
            'options' => ['cold', 'windy', 'snowy', 'cool'],
        ],
        [
            'number' => 2,
            'item' => 'Mexico City',
            'correct' => ['warm', 'wet'],
            'options' => ['dry', 'warm', 'cool', 'wet'],
        ],
        [
            'number' => 3,
            'item' => 'Tokyo',
            'correct' => ['cloudy', 'rainy'],
            'options' => ['humid', 'cloudy', 'windy', 'rainy'],
        ],
        [
            'number' => 4,
            'item' => 'New York',
            'correct' => ['windy', 'cold'],
            'options' => ['sunny', 'windy', 'wet', 'cold'],
        ],
        [
            'number' => 5,
            'item' => 'Taipei',
            'correct' => ['cloudy', 'wet', 'hot'],
            'options' => ['cloudy', 'cool', 'wet', 'hot'],
        ],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])
