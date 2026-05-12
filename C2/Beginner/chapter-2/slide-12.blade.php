<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => 'New Language',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'slang-time-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Back it up',
                ],
                [
                    'text' => 'Make a strong case',
                ],
                [
                    'text' => 'See both sides',
                ],
                [
                    'text' => 'That holds weight', 
                ],
                [
                    'text' => 'Think critically',
                ],
                [
                    'text' => 'Support your idea',
                ],
                [
                    'text' => 'Argue well',
                ],
                [
                    'text' => 'Understand pros & cons',
                ],
                [
                    'text' => "It's convincing",
                ],
                [
                    'text' => 'Analyze deeply',
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])
