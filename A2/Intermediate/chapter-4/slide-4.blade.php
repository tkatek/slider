<?php
$content = [
    'video'          => materialAsset('slider/A2/Intermediate/chapter-X/videos/slideX.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Intermediate/chapter-X/img/slideX.webp'),
    'showTranscript' => 0,
    'isQuiz'         => 0,

    'questions' => [
        [
            'time' => 4000,
            'type' => 'multiple_choice',
            'question' => 'I ........................... my coffee.',
            'options' => ['Dropped', 'Spilled', 'Broke', 'Lost'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 24000,
            'type' => 'multiple_choice',
            'question' => 'I ........................ my keys.',
            'options' => ['Tripped', 'Forgot', 'Lost', 'Missed'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 125000,
            'type' => 'multiple_choice',
            'question' => 'I ....................... my finger with a knife.',
            'options' => ['Cut', 'Broke', 'Burned', 'Dropped'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 214000,
            'type' => 'multiple_choice',
            'question' => 'If you are waiting for a bus and it does not arrive on time, you say.......................',
            'options' => [
                'The bus is full.',
                'The bus is late.',
                'The bus is lost.',
                'The bus is broken.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 317000,
            'type' => 'multiple_choice',
            'question' => 'We ..................... of milk.',
            'options' => ['Lost', 'Forgot', 'Ran out of', 'Missed'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 1,   'end' => 3,   'text' => 'I spilled my coffee.'],
        ['start' => 11,  'end' => 13,  'text' => 'I dropped my phone.'],
        ['start' => 21,  'end' => 23,  'text' => 'I lost my keys.'],
        ['start' => 32,  'end' => 34,  'text' => 'I spilled water on my book.'],
        ['start' => 41,  'end' => 43,  'text' => 'I tripped on the street.'],
        ['start' => 51,  'end' => 53,  'text' => 'I lost my money.'],

        ['start' => 62,  'end' => 64,  'text' => 'A dog chased me.'],
        ['start' => 73,  'end' => 75,  'text' => 'A mosquito bit me.'],
        ['start' => 82,  'end' => 84,  'text' => 'I cut my finger.'],
        ['start' => 91,  'end' => 93,  'text' => 'I burned my hand.'],
        ['start' => 101, 'end' => 103, 'text' => 'I forgot my wallet.'],
        ['start' => 111, 'end' => 113, 'text' => 'My bag is heavy.'],

        ['start' => 121, 'end' => 123, 'text' => 'My shoe is dirty.'],
        ['start' => 131, 'end' => 133, 'text' => 'I broke my glass.'],

        ['start' => 193, 'end' => 195, 'text' => 'I fell down.'],
        ['start' => 203, 'end' => 205, 'text' => 'I hit my head.'],
        ['start' => 211, 'end' => 213, 'text' => 'The bus is late.'],
        ['start' => 224, 'end' => 226, 'text' => 'I missed the bus.'],
        ['start' => 231, 'end' => 233, 'text' => 'The train is full.'],

        ['start' => 242, 'end' => 244, 'text' => 'I took the wrong bus.'],
        ['start' => 252, 'end' => 254, 'text' => 'My bike tire is flat.'],
        ['start' => 262, 'end' => 264, 'text' => 'I got lost.'],
        ['start' => 272, 'end' => 274, 'text' => 'The road is bad.'],
        ['start' => 282, 'end' => 284, 'text' => 'My car is hot.'],
        ['start' => 292, 'end' => 294, 'text' => 'I have no gas.'],
        ['start' => 302, 'end' => 304, 'text' => 'The traffic is bad.'],
        ['start' => 314, 'end' => 316, 'text' => 'I ran out of milk.'],
        ['start' => 322, 'end' => 324, 'text' => 'My chair is wobbly.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
