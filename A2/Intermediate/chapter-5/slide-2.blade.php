<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '❓',
            'title'       => 'Ask and answer:',
            'description' => '“What were you doing when…?”',
        ],
        [
            'emoji'       => '🕒',
            'title'       => 'Describe at least one past event using:',
            'description' => 'was/were + verb-ing + when + past simple',
        ],
        [
            'emoji'       => '🔗',
            'title'       => 'Use when / while / suddenly correctly',
            'description' => 'in context',
        ],
        [
            'emoji'       => '🎧',
            'title'       => 'Identify main ideas',
            'description' => 'in a short listening text',
        ],
        [
            'emoji'       => '✍️',
            'title'       => 'Write a paragraph',
            'description' => 'Write a 5–7 sentence paragraph about a past event',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
