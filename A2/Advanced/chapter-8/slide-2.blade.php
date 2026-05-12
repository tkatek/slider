<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'outcomes' => [
        [
            'emoji'  => '🗣️',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Learning Difficulties',
            'description' => 'Discuss difficulties in learning English.',
        ],
        [
            'emoji'  => '💪',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => 'Perseverance',
            'description' => 'Understand motivational messages about perseverance.',
        ],
        [
            'emoji'  => '📚',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => 'Learning Challenges',
            'description' => 'Use vocabulary related to learning challenges.',
        ],
        [
            'emoji'  => '✅',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Advice & Encouragement',
            'description' => 'Give advice and encouragement using imperatives.',
        ],
        [
            'emoji'  => '🚀',
            'badge'  => 'from-rose-500 to-pink-500',
            'title'  => 'Improve English Skills',
            'description' => 'Talk about ways to improve English skills.',
        ],
        [
            'emoji'  => '✍️',
            'badge'  => 'from-indigo-500 to-sky-500',
            'title'  => 'Motivational Advice',
            'description' => 'Write motivational advice for English learners.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])