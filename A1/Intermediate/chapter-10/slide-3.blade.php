<?php

$content = array_replace_recursive([
    'page_title' => 'Warm-up',
    'title'      => 'Warm-up',
    'subtitle'   => '',
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
            'question' => 'What should you pack for your beach holiday?',
            'answer'   => 'I should pack my flip flops.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide3/flip-flops.webp'),
        ],
        [
            'question' => 'What should you pack for your beach holiday?',
            'answer'   => 'I should pack my sunglasses.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide3/sunglasses.webp'),
        ],
        [
            'question' => 'What should you pack for your beach holiday?',
            'answer'   => 'I should pack my shorts.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide3/shorts.webp'),
        ],
        [
            'question' => 'What should you pack for your beach holiday?',
            'answer'   => 'I should pack my towel.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide3/towel.webp'),
        ],
        [
            'question' => 'What should you pack for your beach holiday?',
            'answer'   => 'I should pack my hairdryer.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide3/hairdryer.webp'),
        ],
        [
            'question' => 'What should you pack for your beach holiday?',
            'answer'   => 'I should pack my sunscreen.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-10/img/slide3/sunscreen.webp'),
        ],
    ],

], $content ?? []);

?>

@include("slider.game.question-answer", ['content' => $content])