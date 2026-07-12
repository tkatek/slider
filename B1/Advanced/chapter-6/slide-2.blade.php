<?php

$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, you will be able to:',

    'objectives' => [
        [
            'emoji' => '🌍',
            'title' => 'Name ways people, schools, and communities help protect the environment.',
        ],
        [
            'emoji' => '🎧',
            'title' => 'Find the main idea and important details in a reading or listening about environmental projects.',
        ],
        [
            'emoji' => '🌱',
            'title' => 'Use words and phrases about caring for the environment in simple sentences.',
        ],
        [
            'emoji' => '🎯',
            'title' => 'Use “to + infinitive” for purpose.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Share your opinion and give clear reasons to encourage others to act responsibly.',
        ],
        [
            'emoji' => '📢',
            'title' => 'Make and present a short plan for an environmental action or campaign.',
        ],
    ],
];

?>

@include('slider.other.learning-objectives', ['content' => $content])