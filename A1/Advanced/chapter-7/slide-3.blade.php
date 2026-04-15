<?php

$content = array_replace_recursive([
    'page_title' => 'Warm-up: Practice 1',
    'title'      => 'Warm-up: Practice 1',
    'subtitle'   => 'Safe or Unsafe?',


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
            'question' => 'Safe or Unsafe?',
            'answer' => 'Safe.',
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide3/1.webp'),
        ],
        [
            'question' => 'Safe or Unsafe?',
            'answer' => 'Unsafe.',
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide3/2.webp'),
        ],
        [
            'question' => 'Safe or Unsafe?',
            'answer' => 'Safe.',
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide3/3.webp'),
        ],
        [
            'question' => 'Safe or Unsafe?',
            'answer' => 'Unsafe.',
            'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide3/4.webp'),
        ],

    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])