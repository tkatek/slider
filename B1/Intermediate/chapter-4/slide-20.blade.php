<?php
$content = [
    'page_title' => 'Speaking',
    'title'      => 'Speaking',
    'subtitle'   => '',
    'instruction' => '',
    'box_label' => 'Question',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 4,
            'md'   => 4,
            'lg'   => 4,
        ],
    ],

    'items' => [
        'Name some of the famous logos worldwide.',
        'Do you think expensive goods make people happy?',
        'What is something that you can spend money on that will make you happy?',
        'What is one luxury item that you really want to have?',
        'Which brands spend the most money on advertising?',
        'What are some of your favourite brands? and why?',
        'Rank these from most influential to least influential: Apple, Nike, Coca-Cola, Samsung, McDonald\'s.',
    ],
];
?>

@include("slider.game.warming-up", ['content' => $content])