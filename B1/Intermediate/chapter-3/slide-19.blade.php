<?php

$content = [
    'title'    => 'Quick wrap-up!',
    'subtitle' => 'Complete the sentences with a suitable modal of deduction',

    'items' => [
        [
            'emoji'  => '🏆',
            'prefix' => 'Who do you think',
            'suffix' => 'win the next World Cup?',
            'answer' => 'will',
        ],
    ],
];

?>

@include('slider.game.text-response', ['content' => $content])