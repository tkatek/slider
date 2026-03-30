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

    // ✅ Updated items (What is this? -> health problems)
    'items' => [
        [
            'question' => 'What is this?',
            'answer'   => 'An earache.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/earache.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A cold / the flu.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/cold.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A headache.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/headache.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'Feeling dizzy.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/dizzy.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A fever / a temperature.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/fever.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A cough.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/cough.webp'),
        ],
        [
            'question' => 'What is this?',
            'answer'   => 'A toothache.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-5/slide2/toothache.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])