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
            'image'    => materialAsset('slider/A1/Advanced/chapter-9/img/slide2/mall.webp'),
        ],
        [
            'question' => "It's got lots of books. It's a .......",
            'answer'   => 'A library.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/library.webp'),
        ],
        [
            'question' => 'You buy medicines here. It’s a ........',
            'answer'   => 'A pharmacy.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-9/img/slide2/pharmacy.webp'),
        ],
        [
            'question' => 'You buy food here. It’s a ........',
            'answer'   => 'A supermarket.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/supermarket.webp'),
        ],
        [
            'question' => 'You can send letters here. It’s a ........',
            'answer'   => 'A post office.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/post-office.webp'),
        ],
        [
            'question' => 'The restaurant is .................... to the school.',
            'answer'   => 'Next.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-9/img/slide2/next.webp'),
        ],
        [
            'question' => 'The police station is ................... the bank and the store.',
            'answer'   => 'Between.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-9/img/slide2/between.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])