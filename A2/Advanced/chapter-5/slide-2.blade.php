<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '🌍',
            'title'       => 'Talk about feelings when living in a new country',
            'description' => '',
        ],
        [
            'emoji'       => '❓',
            'title'       => 'Ask and answer questions using:',
            'description' => '👉 Have you ever + past participle?',
        ],
        [
            'emoji'       => '🧳',
            'title'       => 'Describe simple life experiences abroad',
            'description' => '',
        ],
        [
            'emoji'       => '🏠',
            'title'       => 'Understand and use vocabulary related to homesickness and adaptation',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])