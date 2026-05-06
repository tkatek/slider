<?php

$content = [
    'title' => 'Practice 6',
    'subtitle' => 'Find the mistake! Each sentence has one mistake. Write the correct word or form.',
    'hide_hints' => false,

    'questions' => [
        [
            'prefix' => '1. I',
            'suffix' => 'lived in this city for two months.',
            'hint' => 'has',
            'answers' => [
                'have',
            ],
        ],
        [
            'prefix' => '2. Have you ever',
            'suffix' => 'a famous person?',
            'hint' => 'saw',
            'answers' => [
                'seen',
            ],
        ],
        [
            'prefix' => '3. She has',
            'suffix' => 'the new library today.',
            'hint' => 'visit',
            'answers' => [
                'visited',
            ],
        ],
        [
            'prefix' => "4. They haven’t",
            'suffix' => 'tried the local food.',
            'hint' => 'never',
            'answers' => [
                '',
                'ever',
            ],
        ],
        [
            'prefix' => '5. My friend',
            'suffix' => 'been to the bank already.',
            'hint' => 'have',
            'answers' => [
                'has',
            ],
        ],
    ],
];

?>

@include('slider.game.type-correct-format', ['content' => $content])
