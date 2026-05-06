<?php
$content = [
    'mode' => 'type_table',
    'page_title' => 'Listening',
    'title' => 'Listening',
    'subtitle' => '',
    'instruction' => 'People are describing their favorite gadgets and machines. Which gadget is each person describing? Listen and write the correct letter.',
    'instruction_note' => 'Write the correct letter.',
    'audio' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide13/listening.mp3'),

    'transcript' => [
        '1. I love this computer. It is small and light. I can carry it with me. I take it to the library to work.',
        '2. This camera is very good. It does not use film. I can see my pictures on my computer. If a picture is bad, I delete it.',
        '3. I like this machine. I put dirty dishes inside. I add soap and press a button. It cleans the dishes.',
        '4. I love this phone. I use it everywhere. I talk on it on the bus, train, and in the street.',
        '5. I live in a small apartment. I like this gadget because it is small. It is light and thin. I can put it on the wall. I watch the news when I cook. I watch movies before I sleep.',
    ],

    'options_list' => [
        'a. dishwasher',
        'b. flat screen TV',
        'c. laptop computer',
        'd. camera',
        'e. cell phone',
    ],

    'table_headers' => ['Number', 'Letter'],
    'country_placeholder' => 'Letter',

    'rows' => [
        [
            'superstition' => '1',
            'answers' => [
                ['country_answer' => 'c'],
            ],
        ],
        [
            'superstition' => '2',
            'answers' => [
                ['country_answer' => 'd'],
            ],
        ],
        [
            'superstition' => '3',
            'answers' => [
                ['country_answer' => 'a'],
            ],
        ],
        [
            'superstition' => '4',
            'answers' => [
                ['country_answer' => 'e'],
            ],
        ],
        [
            'superstition' => '5',
            'answers' => [
                ['country_answer' => 'b'],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])
