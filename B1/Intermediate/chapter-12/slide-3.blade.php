<?php
$content = [
    'title'    => 'Warm-up Practice 1',
    'subtitle' => 'Drag & drop each group of words in the right column!',

    'categories' => [
        'Synonym' => [
            'emoji' => '⭐',
            'items' => [
                'compassion - kindness',
                'worthless - useless',
                'judging - criticizing',
                'outcasted - isolated',
                'ignite - spark',
            ],
        ],

        'Antonym' => [
            'emoji' => '⭐',
            'items' => [
                'empathy - indifference',
                'tolerance - intolerance',
                'respect - disrespect',
                'inclusion - exclusion',
                'care - coldness',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])