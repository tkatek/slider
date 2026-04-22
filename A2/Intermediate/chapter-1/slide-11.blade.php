<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'How do you think people greet each other in Korea?<br>First listen, then choose the correct option.',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'audio' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide11.mp3'),

    'script' => 'In Korea, when two male friends meet, they usually just say, "Yes," or they say, "Hello." But when two female friends meet, they hug, but they don\'t kiss usually. Um, when male and female friends meet, they also just say, "Hello."',

    'questions' => [
        [
            'prompt'  => 'Two male friends usually...',
            'correct' => 'Say “Yes” or “Hello”',
            'options' => [
                'Hug each other',
                'Kiss each other',
                'Say “Yes” or “Hello”',
                'Shake hands',
            ],
        ],
        [
            'prompt'  => 'Two female friends usually...',
            'correct' => 'Hug',
            'options' => [
                'Bow',
                'Hug',
                'Shake hands',
                'Say “Yes”',
            ],
        ],
        [
            'prompt'  => 'Male and female friends usually...',
            'correct' => 'Say “Hello”',
            'options' => [
                'Kiss',
                'Hug',
                'Say “Hello”',
                'Clap their hands',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
