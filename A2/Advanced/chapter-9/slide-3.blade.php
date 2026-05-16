<?php

$content = [
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => 'Pick a number, then answer the question',
    'instruction' => 'After you finish this activity, Can you tell why do we need English?',
    'box_label' => 'Question',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 4,
            'md'   => 4,
            'lg'   => 4,
        ],
        'gap' => 'gap-3 sm:gap-4 lg:gap-5',
        'card_height' => 'h-32 sm:h-36 lg:h-40',
    ],

    'items' => [
        'Have you ever spoken to a tourist in English?',
        'Have you ever needed to speak in English on the phone?',
        'Have you ever sent an email in English?',
        'Have you ever seen a movie or video clip in English?',
        'Have you ever read a book or magazine in English?',
        'Have you ever asked for directions in English in a foreign city?',
        'Have you ever used an app or website to improve your English?',
    ],
];

?>

@include("slider.game.warming-up", ['content' => $content])

