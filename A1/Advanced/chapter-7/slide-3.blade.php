<?php

$content = array_replace_recursive([
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1',
    'subtitle'   => 'Safe or Unsafe?',
    'theme'      => '#6366f1',

    'grid' => [
        'cols' => [
            'base' => 1,
            'sm'   => 1,
            'md'   => 2,
            'lg'   => 3,
        ],
        'gap' => 'gap-3 sm:gap-4 lg:gap-5',
        'card_height' => 'h-24 sm:h-28 lg:h-32',
    ],

    'sounds' => [
        'click' => materialAsset('slider/sounds/tap.wav'),
        'done'  => materialAsset('slider/sounds/correct.wav'),
        'skip'  => materialAsset('slider/sounds/click.wav'),
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