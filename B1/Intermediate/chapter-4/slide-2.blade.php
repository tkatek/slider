<?php
$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🏷️',
            'title' => 'Use 8–10 branding-related words and collocations accurately.',
        ],
        [
            'emoji' => '⏳',
            'title' => 'Identify the difference between Present Simple and Past Simple in context.',
        ],
        [
            'emoji' => '🎯',
            'title' => 'Complete grammar tasks with at least 80% accuracy.',
        ],
        [
            'emoji' => '📖',
            'title' => 'Understand key information about famous brands from a reading and listening text.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write an 80–100 word paragraph about a brand using both tenses correctly.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Participate in a discussion expressing and supporting opinions about brands.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])