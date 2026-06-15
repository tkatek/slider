<?php

$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Warm-up',
    'subtitle'   => 'What do you wish for?!',
    'card_label' => '',

    'card_type'  => 'image',

    'cards' => [
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide4/country-visit.webp'),
            'sentence' => 'A country you wish you could visit one day',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide4/money-spent.webp'),
            'sentence' => 'Something you wish you hadn’t spent your money on.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide4/language-speak.webp'),
            'sentence' => 'A language you wish you could speak.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide4/free-time-activity.webp'),
            'sentence' => 'A free time activity you wish you had more time to do.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide4/help-country.webp'),
            'sentence' => 'Something you wish you could do for your country.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide4/daily-activity.webp'),
            'sentence' => 'An activity you wish you didn’t have to do every day.',
        ],
        [
            'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide4/gadget.webp'),
            'sentence' => 'A gadget you wish you had.',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])