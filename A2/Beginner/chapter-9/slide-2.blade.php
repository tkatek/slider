<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Lesson Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '👤',
            'badge'       => 'from-orange-500 to-orange-600',
            'title'       => 'Describe Appearance',
            'description' => 'Describe appearance using has got / have got.',
        ],
        [
            'emoji'       => '😊',
            'badge'       => 'from-amber-400 to-orange-500',
            'title'       => 'Describe Personality',
            'description' => 'Describe personality using is/are.',
        ],
        [
            'emoji'       => '🎨',
            'badge'       => 'from-orange-600 to-amber-500',
            'title'       => 'Adjective Order',
            'description' => 'Use simple adjective order (size + style + color).',
        ],
        [
            'emoji'       => '💬',
            'badge'       => 'from-yellow-400 to-orange-400',
            'title'       => 'Ask & Answer Questions',
            'description' => 'Ask and answer simple questions.',
        ],
        [
            'emoji'       => '✍️',
            'badge'       => 'from-amber-500 to-orange-500',
            'title'       => 'Write a Description',
            'description' => 'Write a description of a person in 3–5 sentences.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])