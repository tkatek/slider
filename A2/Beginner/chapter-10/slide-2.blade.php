<?php
$content = [
    'page_title' => 'Learning Objectives',
    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge' => 'from-blue-500 to-blue-600',
            'title' => 'Identify and name common healthy and unhealthy habits',
            'description' => 'eat vegetables, exercise, drink water, eat junk food,',
            'image' => '',
        ],
        [
            'number' => '02',
            'badge' => 'from-violet-500 to-violet-600',
            'title' => 'Use the present simple to talk about daily routines',
            'description' => 'I eat breakfast. She drinks water.',
            'image' => '',
        ],
        [
            'number' => '03',
            'badge' => 'from-emerald-500 to-teal-500',
            'title' => 'Use adverbs of frequency correctly',
            'description' => 'always, usually, sometimes, never,',
            'image' => '',
        ],
        [
            'number' => '04',
            'badge' => 'from-amber-500 to-orange-500',
            'title' => 'Talk about their own habits using simple sentences',
            'description' => 'I always drink water. I sometimes eat fast food.',
            'image' => '',
        ],
        [
            'number' => '05',
            'badge' => 'from-rose-500 to-pink-600',
            'title' => 'Ask and answer questions about habits',
            'description' => 'How often do you exercise? I usually exercise.',
            'image' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])