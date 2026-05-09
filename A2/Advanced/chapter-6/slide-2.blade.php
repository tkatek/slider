<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => '🌍 Living Abroad',
            'description' => 'Talk about challenges of living abroad.',
        ],
        [
            'number' => '02',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => '✅ Present Perfect',
            'description' => 'Describe experiences using the Present Perfect.',
        ],
        [
            'number' => '03',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => '🏡 New Life',
            'description' => 'Discuss ways to adapt to a new life.',
        ],
        [
            'number' => '04',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => '❤️ Family & Home',
            'description' => 'Express feelings about family and home.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])