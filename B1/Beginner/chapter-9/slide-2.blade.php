<?php
$content = [
    'type' => 'type3',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '',
            'title' => 'Identify advice in spoken and written texts.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Use If I were you, I would... to give advice.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Understand and respond to common personal problems.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Give appropriate advice in pair and group discussions.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Write a short paragraph giving advice using the target structure.',
            'subtitle' => '',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])