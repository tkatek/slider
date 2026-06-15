<?php
$content = [
    'type' => 'type4',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🙏',
            'title' => 'Ask for favors politely',
        ],
        [
            'emoji' => '💬',
            'title' => 'Respond to requests politely',
        ],
        [
            'emoji' => '🗣️',
            'title' => 'Use common request expressions',
        ],
        [
            'emoji' => '👂',
            'title' => 'Understand short conversations about favors',
        ],
        [
            'emoji' => '🤝',
            'title' => 'Role-play asking for and giving help',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write short polite requests',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])