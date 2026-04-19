<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'  => '❤️',
            'badge'  => 'from-orange-500 to-orange-600',
            'title'  => 'Express likes and dislikes about different seasons using like / love / don’t like / hate',
            'description' => '',
        ],
        [
            'emoji'  => '🌤️',
            'badge'  => 'from-amber-400 to-orange-500',
            'title'  => 'Talk about activities they do in different weather using the present simple',
            'description' => '',
        ],
        [
            'emoji'  => '💬',
            'badge'  => 'from-orange-600 to-amber-500',
            'title'  => 'Give simple reasons using because',
            'description' => '',
        ],
        [
            'emoji'  => '❓',
            'badge'  => 'from-yellow-400 to-orange-400',
            'title'  => 'Ask and answer questions about preferences using Do you prefer…?',
            'description' => '',
        ],
        [
            'emoji'  => '✍️',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Write 4–5 simple sentences about their favorite weather',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])