<?php
$content = [
    'type' => 'type2',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '📈',
            'title' => 'Personal Progress',
            'subtitle' => 'Talk about personal progress and achievement.',
        ],
        [
            'emoji' => '💪',
            'title' => 'Challenges & Improvements',
            'subtitle' => 'Describe challenges and improvements.',
        ],
        [
            'emoji' => '🏆',
            'title' => 'Confidence & Success',
            'subtitle' => 'Express confidence and success.',
        ],
        [
            'emoji' => '🚀',
            'title' => 'Progress & Perseverance',
            'subtitle' => 'Use language related to progress and perseverance.',
        ],
        [
            'emoji' => '🧠',
            'title' => 'Practice & Improvement',
            'subtitle' => 'Discuss how practice helps people improve.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Learning Experience',
            'subtitle' => 'Write about a personal learning experience.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])