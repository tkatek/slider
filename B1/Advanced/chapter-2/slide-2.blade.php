<?php

$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, I can...',

    'objectives' => [
        [
            'emoji' => '🔍',
            'title' => 'Identify and interpret modal verbs and expressions used to express different degrees of certainty in the present, future, and past.',
        ],
        [
            'emoji' => '💬',
            'title' => "Use expressions such as It's possible that..., It's probable that..., Perhaps..., Maybe..., and It's certain that... to make predictions.",
        ],
        [
            'emoji' => '🗣️',
            'title' => 'Express my opinions about future events using appropriate certainty expressions.',
        ],
        [
            'emoji' => '🤝',
            'title' => 'Discuss different future possibilities with my classmates and explain my reasons.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write a short paragraph making predictions about the future using a variety of certainty expressions.',
        ],
    ],
];

?>

@include('slider.other.learning-objectives', ['content' => $content])