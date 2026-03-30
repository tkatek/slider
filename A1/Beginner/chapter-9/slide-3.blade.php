<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, you will be able to:',

    'outcomes' => [
        [
            'label' => 'Food Categories',
            'text'  => 'Understand food categories. 🍎🥕🐟',
        ],
        [
            'label' => 'Quantifiers',
            'text'  => 'Learn about food quantifiers. 🥛🍞',
        ],
        [
            'label' => 'Shopping',
            'text'  => 'Use simple interactions with a cashier and read prices. 🛒💶',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])