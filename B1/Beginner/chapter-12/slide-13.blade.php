<?php

$content = [
    'page_title' => 'Speaking Time',
    'title'      => 'Speaking Time',
    'subtitle'   => 'What should you have done?',
    'card_label' => '',

    'card_type'  => 'image',

    'cards' => [
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/1.webp'),
            'sentence' => 'Your husband/boyfriend is angry.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/2.webp'),
            'sentence' => "You're broke.",
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/3.webp'),
            'sentence' => 'You forgot to write an important email to one of your key clients.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/4.webp'),
            'sentence' => 'You have a sunburn.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/5.webp'),
            'sentence' => 'You missed your flight.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/6.webp'),
            'sentence' => 'You broke your arm.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/7.webp'),
            'sentence' => 'You failed your exam.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/8.webp'),
            'sentence' => "You forgot about your friend's birthday.",
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/9.webp'),
            'sentence' => "You can't see anything because of the sun.",
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide13/10.webp'),
            'sentence' => 'You slipped over the wet floor.',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])