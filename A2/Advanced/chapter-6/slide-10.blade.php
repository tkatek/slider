<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'You will hear five people talking about problems they had working abroad',

    'mode'  => 'type_table',
    'audio' => materialAsset('slider/A2/Advanced/chapter-6/audios/slide10.mp3'),

    'instruction'      => 'For each person decide which problem they mention. Write A–H',
    'instruction_note' => '',

    'options_list_title' => 'Problems',
    'options_list' => [
        'A' => 'the hot weather',
        'B' => 'problems with the language',
        'C' => 'the place to live',
        'D' => 'the local food',
        'E' => 'the office or workplace',
        'F' => 'the time spent at work',
        'G' => 'no free time',
        'H' => 'the travel to work',
    ],

    'table_headers' => ['Speaker', 'Answer'],
    'row_heading'   => 'Speaker',

    'country_placeholder' => 'A-H',

    'rows' => [
        [
            'superstition' => 'Speaker 1',
            'answers' => [
                [
                    'country_answer' => 'C',
                ],
            ],
        ],
        [
            'superstition' => 'Speaker 2',
            'answers' => [
                [
                    'country_answer' => 'E',
                ],
            ],
        ],
        [
            'superstition' => 'Speaker 3',
            'answers' => [
                [
                    'country_answer' => 'F',
                ],
            ],
        ],
        [
            'superstition' => 'Speaker 4',
            'answers' => [
                [
                    'country_answer' => 'B',
                ],
            ],
        ],
        [
            'superstition' => 'Speaker 5',
            'answers' => [
                [
                    'country_answer' => 'G',
                ],
            ],
        ],
    ],

    'transcript' => [
        'Speaker 1 (Malawi)',
        'I liked Malawi, but I had to live in a tent. The nearest town was too far away, so the journey took too long.',

        'Speaker 2 (London)',
        'My office in London was too noisy. I shared it with ten people and could not concentrate on my work.',

        'Speaker 3 (Ecuador)',
        'I made many friends in Ecuador, but the working days were too long. I was always tired on the weekends.',

        'Speaker 4 (Bangkok)',
        'I lived in Bangkok for six years. I did not speak Thai, so I needed a translator for every meeting.',

        'Speaker 5 (Norway)',
        'I worked every evening and weekend in Norway. I had no free time to see the country.',
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])
