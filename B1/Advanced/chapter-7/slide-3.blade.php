<?php

$content = [
    'title'    => 'Practice 1: Warm-up',
    'subtitle' => '',

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
            'question' => 'You dropped your phone and broke the screen. What did you do afterward?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Advanced/chapter-7/img/slide3/broken-phone-screen.webp'),
        ],
        [
            'question' => 'Your girlfriend has just come back from a nail salon. What do you say to her?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Advanced/chapter-7/img/slide3/nail-salon.webp'),
        ],
        [
            'question' => 'You are too busy to clean your flat this week. What are you going to do?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Advanced/chapter-7/img/slide3/cleaning-flat.webp'),
        ],
        [
            'question' => 'You need to apply for a visa, but your documents are in your native language. What are you going to do?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Advanced/chapter-7/img/slide3/translate-documents.webp'),
        ],
        [
            'question' => 'You spilled juice on your favorite dress or suit. What will you do with it?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Advanced/chapter-7/img/slide3/dry-cleaning-clothes.webp'),
        ],
        [
            'question' => 'You have just come back from the dentist. What did you have done there?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Advanced/chapter-7/img/slide3/dentist-filling.webp'),
        ],
        [
            'question' => 'You bought curtains that are too long. What do you need to do?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Advanced/chapter-7/img/slide3/shorten-curtains.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])