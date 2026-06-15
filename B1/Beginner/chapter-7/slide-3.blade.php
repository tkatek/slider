<?php

$content = [
    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🌟',
            'title' => 'Identify wishes',
            'description' => 'Identify wishes in spoken and written texts.',
        ],
        [
            'emoji' => '🔍',
            'title' => 'Distinguish wish forms',
            'description' => 'Distinguish between present, past, and future wishes.',
        ],
        [
            'emoji' => '🧩',
            'title' => 'Use target structures',
            'description' => 'Use wish + past simple, wish + could, and wish + past perfect accurately in controlled practice.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Talk about personal wishes',
            'description' => 'Talk about personal wishes using at least three target structures.',
        ],
    ],
];

?>

@include('slider.other.learning-objectives', ['content' => $content])