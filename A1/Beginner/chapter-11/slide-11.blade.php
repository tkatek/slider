<?php

$content = array_replace_recursive([
    'page_title' => 'Now can you say what’s the problem?',
    'title'      => 'Now can you say what’s the problem?',
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
            'question' => 'What\'s the problem?',
            'answer'   => 'The window is broken.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide11/broken.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The wall is cracked.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide11/cracked.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The sink drain is clogged.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide11/clogged.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The window screen is torn.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide11/torn.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The walkway is slippery.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide11/wet.webp'),
        ],
        [
            'question' => 'What\'s the problem?',
            'answer'   => 'The air conditioner is very loud.',
            'image'    => materialAsset('slider/A1/Beginner/chapter-11/img/slide11/loud.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer",['content'=>$content])