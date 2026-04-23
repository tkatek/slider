<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '❓',
            'title'       => 'Ask and answer questions using:',
            'description' => '“What happened while…?”',
        ],
        [
            'emoji'       => '📝',
            'title'       => 'Describe at least one situation using:',
            'description' => 'when (interruption)<br>while (simultaneous actions)',
        ],
        [
            'emoji'       => '🔤',
            'title'       => 'Use past continuous correctly',
            'description' => 'was/were + verb-ing',
        ],
        [
            'emoji'       => '📖',
            'title'       => 'Identify main events',
            'description' => 'in a short story',
        ],
        [
            'emoji'       => '✍️',
            'title'       => 'Write a 5–7 sentence paragraph using:',
            'description' => 'at least 1 “when” sentence',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
