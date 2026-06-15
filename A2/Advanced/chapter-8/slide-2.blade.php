<?php
$content = [
    'type' => 'type1',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🗣️',
            'title' => 'Learning Difficulties',
            'subtitle' => 'Discuss difficulties in learning English.',
        ],
        [
            'emoji' => '💪',
            'title' => 'Perseverance',
            'subtitle' => 'Understand motivational messages about perseverance.',
        ],
        [
            'emoji' => '📚',
            'title' => 'Learning Challenges',
            'subtitle' => 'Use vocabulary related to learning challenges.',
        ],
        [
            'emoji' => '✅',
            'title' => 'Advice & Encouragement',
            'subtitle' => 'Give advice and encouragement using imperatives.',
        ],
        [
            'emoji' => '🚀',
            'title' => 'Improve English Skills',
            'subtitle' => 'Talk about ways to improve English skills.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Motivational Advice',
            'subtitle' => 'Write motivational advice for English learners.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])