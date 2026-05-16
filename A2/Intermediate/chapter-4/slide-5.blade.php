<?php
$content = [
    'video'          => materialAsset('slider/A2/Intermediate/chapter-4/video/problems-encrypted/problems.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Intermediate/chapter-4/img/slide4.webp'),
    'showTranscript' => 0,
    'isQuiz'         => 1,

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
            'time' => 16000,
            'type' => 'multiple_choice',
            'question' => 'I ........................ my keys.',
            'options' => ['Tripped', 'Forgot', 'Lost', 'Missed'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 53000,
            'type' => 'multiple_choice',
            'question' => 'I ....................... my finger with a knife.',
            'options' => ['Cut', 'Broke', 'Burned', 'Dropped'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 101000,
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
            'time' => 161000,
            'type' => 'multiple_choice',
            'question' => 'We ..................... of milk.',
            'options' => ['Lost', 'Forgot', 'Ran out of', 'Missed'],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,   'end' => 3.5,   'text' => 'I spilled my coffee.'],
        ['start' => 5.5,  'end' => 9,  'text' => 'I dropped my phone.'],
        ['start' => 12.5,  'end' => 15,  'text' => 'I lost my keys.'],
        ['start' => 18.5,  'end' => 21,  'text' => 'I spilled water on my book.'],
        ['start' => 24.5,  'end' => 27,  'text' => 'I tripped on the street.'],
        ['start' => 30,  'end' => 33,  'text' => 'I lost my money.'],

        ['start' => 36,  'end' => 39,  'text' => 'A dog chased me.'],
        ['start' => 42,  'end' => 45,  'text' => 'A mosquito bit me.'],
        ['start' => 49,  'end' => 52,  'text' => 'I cut my finger.'],
        ['start' => 54.5,  'end' => 57,  'text' => 'I burned my hand.'],
        ['start' => 61, 'end' => 64, 'text' => 'I forgot my wallet.'],
        ['start' => 66, 'end' => 69, 'text' => 'My bag is heavy.'],

        ['start' => 73, 'end' => 76, 'text' => 'My shoe is dirty.'],
        ['start' => 78.3, 'end' => 81, 'text' => 'I broke my glass.'],

        ['start' => 84.5, 'end' => 87, 'text' => 'I fell down.'],
        ['start' => 90.5, 'end' => 93, 'text' => 'I hit my head.'],
        ['start' => 97.3, 'end' => 100, 'text' => 'The bus is late.'],
        ['start' => 103.5, 'end' => 106, 'text' => 'I missed the bus.'],
        ['start' => 109, 'end' => 112, 'text' => 'The train is full.'],

        ['start' => 115, 'end' => 118, 'text' => 'I took the wrong bus.'],
        ['start' => 121, 'end' => 124, 'text' => 'My bike tire is flat.'],
        ['start' => 128, 'end' => 131, 'text' => 'I got lost.'],
        ['start' => 133, 'end' => 136, 'text' => 'The road is bad.'],
        ['start' => 139, 'end' => 141.5, 'text' => 'My car is hot.'],
        ['start' => 146, 'end' => 149, 'text' => 'I have no gas.'],
        ['start' => 151, 'end' => 154, 'text' => 'The traffic is bad.'],
        ['start' => 157, 'end' => 160, 'text' => 'I ran out of milk.'],
        ['start' => 163.5, 'end' => 166, 'text' => 'My chair is wobbly.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])