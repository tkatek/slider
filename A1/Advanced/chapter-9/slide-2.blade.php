<?php

$content = array_replace_recursive([
    'page_title' => 'Warm-up',
    'title'      => 'Warm-up',
    'subtitle'   => 'Complete the sentences.',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 2,
            'md'   => 4,
            'lg'   => 4,
        ],
    ],

    'items' => [
        [
            'question' => "It's got a lot of different shops. It's a .......",
            'answer'   => 'A shopping mall.',
            'image'    => '',
        ],
        [
            'question' => "It's got lots of books. It's a .......",
            'answer'   => 'A library.',
            'image'    => '',
        ],
        [
            'question' => 'You buy medicines here. It’s a ........',
            'answer'   => 'A pharmacy.',
            'image'    => '',
        ],
        [
            'question' => 'You buy food here. It’s a ........',
            'answer'   => 'A supermarket.',
            'image'    => '',
        ],
        [
            'question' => 'You can send letters here. It’s a ........',
            'answer'   => 'A post office.',
            'image'    => '',
        ],
        [
            'question' => 'The restaurant is .................... to the school.',
            'answer'   => 'Next.',
            'image'    => '',
        ],
        [
            'question' => 'The police station is ................... the bank and the store.',
            'answer'   => 'Between.',
            'image'    => '',
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])
