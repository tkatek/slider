<?php

$content = array_replace_recursive([
    'page_title' => 'Let’s do a quick revision first!',
    'title'      => 'Let’s do a quick revision first!',
    'subtitle'   => 'Where can you buy',
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
            'question' => 'Where can you buy clothes?',
            'answer' => 'You can buy clothes at a clothes shop.',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide2/clothes.webp'),
        ],
        [
            'question' => 'Where can you buy bread?',
            'answer' => 'You can buy bread at a baker\'s.',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide2/bread.webp'),
        ],
        [
            'question' => 'Where can you buy shoes?',
            'answer' => 'You can buy shoes at a shoe shop.',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide2/shoes.webp'),
        ],
        [
            'question' => 'Where can you buy medicine?',
            'answer' => 'You can buy medicine at a chemist\'s.',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide2/medicine.webp'),
        ],
        [
            'question' => 'Where can you buy meat?',
            'answer' => 'You can buy meat at a butcher\'s.',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide2/meat.webp'),
        ],
        [
            'question' => 'Where can you buy flowers?',
            'answer' => 'You can buy flowers at a florist\'s.',
            'image' => materialAsset('slider/A1/Beginner/chapter-11/img/slide2/flowers.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])