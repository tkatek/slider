<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '😊',
            'title'       => 'Identify common facial expressions',
            'description' => '(e.g. smile, frown, look surprised)',
        ],
        [
            'emoji'       => '😄',
            'title'       => 'Describe feelings using simple adjectives',
            'description' => '(happy, angry, nervous, confused)',
        ],
        [
            'emoji'       => '💬',
            'title'       => 'Use simple expressions to describe people’s emotions',
            'description' => '👉 He looks happy. / She seems confused.',
        ],
        [
            'emoji'       => '🤔',
            'title'       => 'Talk about how they react with every emotion.',
            'description' => '',
        ],
        [
            'emoji'       => '🗣️',
            'title'       => 'Participate in short speaking activities using target vocabulary',
            'description' => '',
        ],
        [
            'emoji'       => '✍️',
            'title'       => 'Write short sentences expressing feelings and emotions using adjectives',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
