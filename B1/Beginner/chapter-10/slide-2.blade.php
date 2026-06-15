<?php
$content = [
    'type' => 'type3',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '',
            'title' => 'Understand the meaning and form of the Past Perfect.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Distinguish between Past Simple and Past Perfect.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Describe the order of past events.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Talk about experiences that happened before another past action.',
            'subtitle' => '',
        ],
        [
            'emoji' => '',
            'title' => 'Write short narratives using the Past Perfect.',
            'subtitle' => '',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])