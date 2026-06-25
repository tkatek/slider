<?php

$content = [
    'title'    => 'Quick Wrap Up!',
    'subtitle' => '',

    'instruction'      => 'Complete the Sentence',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Good brands '],
                [
                    'blank' => true,
                    'answer' => 'build',
                    'answers' => ['build'],
                ],
                ['text' => ' trust.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])