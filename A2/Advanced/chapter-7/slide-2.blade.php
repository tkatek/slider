<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Talk about goals and motivation',
            'description' => '',
        ],
        [
            'number' => '02',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => 'Identify SMART goals',
            'description' => '',
        ],
        [
            'number' => '03',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => 'Use vocabulary related to achievement and success',
            'description' => '',
        ],
        [
            'number' => '04',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Give advice using imperatives',
            'description' => '',
        ],
        [
            'number' => '05',
            'badge'  => 'from-rose-500 to-pink-500',
            'title'  => 'Discuss ways to stay motivated and achieve goals',
            'description' => '',
        ],
        [
            'number' => '06',
            'badge'  => 'from-indigo-500 to-sky-500',
            'title'  => 'Write about personal goals and future plans',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])