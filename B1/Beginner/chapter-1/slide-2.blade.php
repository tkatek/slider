<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-green-700 to-green-500',
            'title'  => '🙏 Ask for favors politely',
            'description' => '',
        ],
        [
            'number' => '02',
            'badge'  => 'from-emerald-600 to-green-500',
            'title'  => '💬 Respond to requests politely',
            'description' => '',
        ],
        [
            'number' => '03',
            'badge'  => 'from-lime-600 to-green-500',
            'title'  => '🗣️ Use common request expressions',
            'description' => '',
        ],
        [
            'number' => '04',
            'badge'  => 'from-teal-600 to-emerald-500',
            'title'  => '👂 Understand short conversations about favors',
            'description' => '',
        ],
        [
            'number' => '05',
            'badge'  => 'from-green-800 to-emerald-600',
            'title'  => '🤝 Role-play asking for and giving help',
            'description' => '',
        ],
        [
            'number' => '06',
            'badge'  => 'from-emerald-700 to-lime-500',
            'title'  => '✍️ Write short polite requests',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])