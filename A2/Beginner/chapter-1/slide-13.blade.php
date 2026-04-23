<?php
$content = [
    'mode' => 'type_table',
    'page_title' => 'Practice 4',
    'title' => 'Practice 4',
    'subtitle' => '',
    'instruction' => 'Listen again. Write the temperatures.',
    'instruction_note' => 'Answer & Transcript',
    'audio' => materialAsset('slider/A2/Beginner/chapter-1/audios/slide12.mp3'),

    'transcript' => [
        'And here is today’s weather forecast for the international traveler. Let’s start with Beijing. It will be a cold day in Beijing today, and windy. The low will be zero and the high will be 6 degrees.',
        'Mexico City will be warm and wet, with a low of 23 degrees Centigrade and a high of 28.',
        'Tokyo is expecting cloudy weather with heavy rain. The low will be 4 degrees.',
        'New York is going to have a windy day. It will be very cold with a low of minus 10 and a high of zero.',
        'In Taipei it will be cloudy, wet, and hot today. The low will be 20 degrees and the high will be 30.',
    ],

    'table_headers' => ['City', 'Low', 'High'],
    'country_placeholder' => 'Low',
    'meaning_placeholder' => 'High',

    'rows' => [
        [
            'superstition' => '1. Beijing',
            'answers' => [
                [
                    'country' => '0°',
                    'country_answer' => '0°|0 degrees|zero|0',
                    'meaning' => '6°',
                    'meaning_answer' => '6°|6 degrees|6',
                    'done' => true,
                ],
            ],
        ],
        [
            'superstition' => '2. Mexico City',
            'answers' => [
                [
                    'country_answer' => '23°|23 degrees|23',
                    'meaning_answer' => '28°|28 degrees|28',
                ],
            ],
        ],
        [
            'superstition' => '3. Tokyo',
            'answers' => [
                [
                    'country_answer' => '4°|4 degrees|4',
                    'meaning_answer' => '12°|12 degrees|12',
                ],
            ],
        ],
        [
            'superstition' => '4. New York',
            'answers' => [
                [
                    'country_answer' => '-10°|-10 degrees|-10|minus 10',
                    'meaning_answer' => '0°|0 degrees|zero|0',
                ],
            ],
        ],
        [
            'superstition' => '5. Taipei',
            'answers' => [
                [
                    'country_answer' => '20°|20 degrees|20',
                    'meaning_answer' => '30°|30 degrees|30',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])
