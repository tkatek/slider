<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-8/videos/encrypted/'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-8/img/'),
    'isQuiz'     => 0,


    'questions' => [
        [
            'time' => 4000,
            'type' => 'multiple_choice',
            'question' => '1. What does John’s wife look like?',
            'options' => [
                'She has short straight hair',
                'She has medium-length wavy black hair',
                'She has long blonde hair',
                'She has curly brown hair',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => '2. What does John’s husband look like?',
            'options' => [
                'He is tall and slim',
                'He has long hair',
                'He has short black hair and a mustache',
                'He has curly hair',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 22000,
            'type' => 'multiple_choice',
            'question' => '3. What does the first boss look like?',
            'options' => [
                'She has straight black hair',
                'She is short and thin',
                'She has curly white hair and wears glasses',
                'She has long blonde hair',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => '4. What does the second boss look like?',
            'options' => [
                'He is tall and overweight',
                'He has a beard',
                'He is average height and slim',
                'He has long hair',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 42000,
            'type' => 'multiple_choice',
            'question' => '5. What does the female best friend look like?',
            'options' => [
                'She has long straight hair',
                'She is tall and thin',
                'She has dyed green spiky hair and freckles',
                'She has black curly hair',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 6,  'text' => 'What does your wife look like, John?'],
        ['start' => 6,  'end' => 13, 'text' => 'She has medium length wavy black hair and likes to wear large earrings. She is tall and thin.'],

        ['start' => 13, 'end' => 17, 'text' => 'How about your husband?'],
        ['start' => 17, 'end' => 24, 'text' => 'He has short black hair and a mustache. He is a little overweight.'],

        ['start' => 24, 'end' => 28, 'text' => 'What does your boss look like?'],
        ['start' => 28, 'end' => 36, 'text' => 'She has curly white hair and she wears glasses. She has a small tattoo on her right wrist.'],

        ['start' => 36, 'end' => 40, 'text' => 'How about your boss?'],
        ['start' => 40, 'end' => 49, 'text' => 'He is average height and slim. He is usually clean-shaven. He has a mole above his upper lip.'],

        ['start' => 49, 'end' => 54, 'text' => 'What does your best friend look like?'],
        ['start' => 54, 'end' => 61, 'text' => 'He is quite short and stocky. He is bald and has a beard. He has green eyes.'],

        ['start' => 61, 'end' => 65, 'text' => 'How about your best friend?'],
        ['start' => 65, 'end' => 72, 'text' => 'She has dyed green spiky hair and freckles. She is short and skinny.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])