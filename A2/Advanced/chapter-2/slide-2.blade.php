<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'  => '🧑‍🏭',
            'badge'  => 'from-orange-500 to-orange-600',
            'title'  => 'Unusual Jobs',
            'description' => 'Describe 4–5 unusual jobs using Present Simple.',
        ],
        [
            'emoji'  => '🎯',
            'badge'  => 'from-amber-400 to-orange-500',
            'title'  => 'Job Purpose',
            'description' => 'Explain job purpose using to + verb.',
        ],
        [
            'emoji'  => '❓',
            'badge'  => 'from-orange-600 to-amber-500',
            'title'  => 'Job Questions',
            'description' => 'Ask and answer questions about jobs.',
        ],
        [
            'emoji'  => '✍️',
            'badge'  => 'from-yellow-400 to-orange-400',
            'title'  => 'Job Writing',
            'description' => 'Write 4 connected sentences about a job.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])