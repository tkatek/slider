<?php

$content = [
    'title'    => 'Quick Wrap Up!',
    'subtitle' => 'Reflection Time!',

    'instruction'      => 'Complete the sentence:',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'A special friend is someone who '],
                [
                    'blank' => true,
                    'answer' => 'is always there for me',
                    'placeholder' => '...',
                    'answers' => [
                        'is always there for me',
                        'listens to me',
                        'helps me when I need help',
                        'cares about me',
                        'supports me',
                    ],
                ],
                ['text' => '.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])