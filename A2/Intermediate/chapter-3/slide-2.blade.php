<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '🌍',
            'title'       => 'Identify common superstitions in different countries',
            'description' => 'Breaking a mirror brings bad luck.',
        ],
        [
            'emoji'       => '🐈‍⬛',
            'title'       => 'Describe superstitions using simple sentences',
            'description' => 'Black cats are seen as unlucky.',
        ],
        [
            'emoji'       => '🧩',
            'title'       => 'Use passive voice to describe beliefs',
            'description' => 'It is believed that…',
        ],
        [
            'emoji'       => '💭',
            'title'       => 'Express opinions about superstitions',
            'description' => 'I think it is true / not true.',
        ],
        [
            'emoji' => '🤝',
            'title' => 'Compare beliefs between cultures',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])