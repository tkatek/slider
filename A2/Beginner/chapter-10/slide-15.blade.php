<?php

$content = [
    'title'    => 'Quick Wrap up!',
    'subtitle' => 'Complete the sentence',

    'instruction'      => 'Complete the sentence',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'If you exercise and eat well, you will be '],
                [
                    'blank' => true,
                    'answer' => 'healthy',
                    'placeholder' => '',
                    'answers' => ['healthy'],
                ],
                ['text' => '.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])
