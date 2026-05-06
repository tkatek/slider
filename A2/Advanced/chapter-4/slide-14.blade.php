<?php

$content = [
    'title' => 'Practice 6',
    'subtitle' => 'Find the mistake! Each sentence has one mistake. Write the correct sentence.',
    'stacked_full_input' => true,
    'stacked_grid_cols_2' => true,

    'questions' => [
        [
            'hint' => '1. I has lived in this city for two months.',
            'answers' => [
                'I have lived in this city for two months.',
            ],
        ],
        [
            'hint' => '2. Have you ever saw a famous person?',
            'answers' => [
                'Have you ever seen a famous person?',
            ],
        ],
        [
            'hint' => '3. She has visit the new library today.',
            'answers' => [
                'She has visited the new library today.',
            ],
        ],
        [
            'hint' => "4. They haven’t never tried the local food.",
            'answers' => [
                "They haven’t tried the local food.",
                "They have never tried the local food.",
                "They haven't tried the local food.",
                "They have never tried the local food.",
            ],
        ],
        [
            'hint' => '5. My friend have been to the bank already.',
            'answers' => [
                'My friend has been to the bank already.', 
            ],
        ],
    ],
];

?>

@include('slider.game.type-correct-format', ['content' => $content])
