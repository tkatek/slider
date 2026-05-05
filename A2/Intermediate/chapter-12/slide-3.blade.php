<?php

$content = array_replace_recursive([
    'page_title' => 'Practice 1: Warm-up',
    'title'      => 'Practice 1: Warm-up',
    'subtitle'   => 'How are you feeling?!',

    'grid' => [
        'cols' => [
            'base' => 1,
            'sm'   => 1,
            'md'   => 3,
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
            'question' => 'I am good!',
            'answer'   => 'Happy',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide3/happy.webp'),
        ],
        [
            'question' => "I can't believe it!",
            'answer'   => 'Angry',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide3/Angry.webp'),
        ],
        [
            'question' => 'This is unbelievable',
            'answer'   => 'Disappointed',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide3/disappointed.webp'),
        ],
        [
            'question' => 'I don’t know what to do',
            'answer'   => 'Scared',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide3/scared.webp'),
        ],
        [
            'question' => 'I feel like crying today',
            'answer'   => 'Sad',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-12/img/slide3/sad.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])