<?php
$content = [
    'type' => 'type3',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🛍️',
            'title' => 'Describe problems with products or services',
        ],
        [
            'emoji' => '🙏',
            'title' => 'Make complaints politely in shops or restaurants',
        ],
        [
            'emoji' => '🆘',
            'title' => 'Ask for help or solutions',
        ],
        [
            'emoji' => '🎧',
            'title' => 'Use customer service vocabulary',
        ],
        [
            'emoji' => '🎭',
            'title' => 'Role-play customer complaint situations',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])