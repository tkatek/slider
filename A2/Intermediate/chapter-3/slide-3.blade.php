<?php

$content = array_replace_recursive([
    'page_title' => 'Practice 1',
    'title'      => 'Warmp-up: Practice 1',
    'subtitle'   => 'Where does this dish come from?',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 4,
            'md'   => 4,
            'lg'   => 4,
        ],
    ],

    'items' => [
        [
            'question' => 'Where does this dish come from?',
            'answer'   => 'Pizza (from Italy)',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-2/img/slide16/pizza.webp'),
        ],
        [
            'question' => 'Where does this dish come from?',
            'answer'   => 'Couscos (Morocco)',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide3/couscos.webp'),
        ],
        [
            'question' => 'Where does this dish come from?',
            'answer'   => 'Flafel (Egypt)',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide3/flafel.webp'),
        ],
        [
            'question' => 'Where does this dish come from?',
            'answer'   => 'Kebab (Turkey)',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide3/kebab.webp'),
        ],
        [
            'question' => 'Where does this dish come from?',
            'answer'   => 'Sushi (Japan)',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide3/sushi.webp'),
        ],
        [
            'question' => 'Where does this dish come from?',
            'answer'   => 'Burger (America)',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-2/img/slide16/burgers.webp'),
        ],
        [
            'question' => 'Where does this dish come from?',
            'answer'   => 'Kabsa (Saudi Arabia)',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide3/kabsa.webp'),
        ],
        [
            'question' => 'Where does this dish come from?',
            'answer'   => 'Croissant (France)',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide3/croissant.webp'),
        ],
    ],

], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])