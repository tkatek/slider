<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, you’ll be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'  => '🕘',
            'badge'  => 'from-orange-500 to-orange-600',
            'title'  => 'Talk about past activities',
            'description' => '',
        ],
        [
            'emoji'  => '✏️',
            'badge'  => 'from-amber-400 to-orange-500',
            'title'  => 'Use past simple (regular & irregular verbs)',
            'description' => '',
        ],
        [
            'emoji'  => '💬',
            'badge'  => 'from-orange-600 to-amber-500',
            'title'  => 'Ask and answer questions about the past',
            'description' => '',
        ],
        [
            'emoji'  => '🎉',
            'badge'  => 'from-yellow-400 to-orange-400',
            'title'  => 'Describe weekend/free-time activities',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])