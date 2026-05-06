<?php

$content = array_replace_recursive([
    'page_title' => 'Discussion',
    'title'      => 'Discussion',
    'subtitle'   => '',


    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 3,
            'md'   => 3,
            'lg'   => 3,
        ],
        'gap' => 'gap-3 sm:gap-4 lg:gap-5',
        'card_height' => 'h-24 sm:h-28 lg:h-32',
    ],



    'items' => [
        [
            'question' => 'Have you ever killed a bug?',
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/A2/Advanced/chapter-4/img/slide3/1.webp'),
        ],
        [
            'question' => 'Have you ever been to another country?',
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/A2/Advanced/chapter-4/img/slide3/2.webp'),
        ],
        [
            'question' => 'Have you ever eaten tiramisu?',
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/A2/Advanced/chapter-4/img/slide3/3.webp'),
        ],
        [
            'question' => 'Have you ever travelled by an airplane?',
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/A2/Advanced/chapter-4/img/slide3/4.webp'),
        ],
        [
            'question' => 'Have you ever fallen asleep at school?',
            'answer'   => '. . . . .',
            'image'    => materialAsset('slider/A2/Advanced/chapter-4/img/slide3/5.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])
