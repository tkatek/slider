<?php
$content = [
    'type' => 'type1',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🏠',
            'title' => 'Neighbour Problems',
            'subtitle' => 'Describe common problems with neighbours.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Polite Complaints',
            'subtitle' => 'Make simple complaints politely and respond to them.',
        ],
        [
            'emoji' => '🔊',
            'title' => 'Apartment Vocabulary',
            'subtitle' => 'Use vocabulary related to noise and apartment problems.',
        ],
        [
            'emoji' => '✋',
            'title' => 'Annoying Behaviour',
            'subtitle' => 'Ask someone to stop or change annoying behaviour.',
        ],
        [
            'emoji' => '🛠️',
            'title' => 'Simple Solutions',
            'subtitle' => 'Suggest simple solutions to neighbourhood problems.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Complaint Note',
            'subtitle' => 'Write a short note to a neighbour complaining about an issue.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])