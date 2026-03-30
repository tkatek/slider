<?php
$content = [
    'page_title'    => 'Warm-up time!',
    'title'         => 'Warm-up time!',
    'subtitle'      => 'Look at the map. Then choose TRUE or FALSE.',
    'image'         => materialAsset('slider/A1/Beginner/chapter-8/img/game-map.webp'),
    'type'          => 'image',

    'questions' => [
        [
            'prompt'  => 'The garage is opposite the bakery.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'The church is next to the library.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'The supermarket is far from the police station.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => "The post office is between the travel's agent and the police station.",
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'The swimming pool is near the bank.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'The music shop is between the café and the toy shop.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'The Italian restaurant is opposite the bus stop.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => "The florist's is next to the cinema.",
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'The Red Star hotel is on Third Avenue.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'The park is on Parkhill Road.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
    ],
];
?>

@include("slider.game.multi-choice-all-in-one", ['content' => $content])