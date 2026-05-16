<?php

$content = [
    'page_title' => 'Quick wrap-up',
    'title'      => 'Quick wrap-up!',
    'subtitle'   => 'Correct the mistakes in the sentences.',

    'grid_class' => 'md:grid-cols-2',

    'items' => [
        [
            'parts' => [
                ['text' => '1. She’s always '],
                ['answer' => 'using', 'placeholder' => 'use'],
                ['text' => ' my phone charger.'],
            ],
        ],
        [
            'parts' => [
                ['text' => '2. They’re always '],
                ['answer' => 'making', 'placeholder' => 'are making'],
                ['text' => ' noise at night.'],
            ],
        ],
        [
            'parts' => [
                ['text' => '3. My roommate is always '],
                ['answer' => 'forgetting', 'placeholder' => 'forgetting'],
                ['text' => ' to clean the kitchen.'],
            ],
        ],
        [
            'parts' => [
                ['text' => '4. You are always '],
                ['answer' => 'interrupting', 'placeholder' => 'interrupt'],
                ['text' => ' me!'],
            ],
        ],
    ],
];

?>

@include('slider.game.image-missing-words', ['content' => $content])
