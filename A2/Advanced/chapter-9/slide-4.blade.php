<?php

$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'outcomes' => [
        [
            'emoji'  => '📈',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Personal Progress',
            'description' => 'Talk about personal progress and achievement.',
        ],
        [
            'emoji'  => '💪',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => 'Challenges & Improvements',
            'description' => 'Describe challenges and improvements.',
        ],
        [
            'emoji'  => '🏆',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => 'Confidence & Success',
            'description' => 'Express confidence and success.',
        ],
        [
            'emoji'  => '🚀',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Progress & Perseverance',
            'description' => 'Use language related to progress and perseverance.',
        ],
        [
            'emoji'  => '🧠',
            'badge'  => 'from-rose-500 to-pink-500',
            'title'  => 'Practice & Improvement',
            'description' => 'Discuss how practice helps people improve.',
        ],
        [
            'emoji'  => '✍️',
            'badge'  => 'from-indigo-500 to-sky-500',
            'title'  => 'Learning Experience',
            'description' => 'Write about a personal learning experience.',
        ],
    ],
];

?>

@include('slider.objectives.objectives', ['content' => $content])