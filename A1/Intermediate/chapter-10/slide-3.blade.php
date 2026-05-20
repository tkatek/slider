<?php

$content = array_replace_recursive([

    'title'      => 'Warm-up',
    'subtitle'   => 'What should you pack for your beach holiday?',


    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 3,

        ],

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