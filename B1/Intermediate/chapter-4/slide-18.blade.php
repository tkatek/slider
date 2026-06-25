<?php

$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen and match the original company names with their logos. One name is extra.',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide18.mp3'),

    'script' => [
        'VISA',
        'Today, VISA is a large international credit card company. However, it did not start with this name. It was first called Bank Americard. Later, the company changed its name to VISA to sound more international. They removed the word “America” and “bank” to help the brand grow worldwide. The word “visa” also suggests travel and moving between countries.',
        'Sara Lee',
        'Sara Lee is a well-known brand of baked goods like cakes, pies, and cookies. The company was first called Consolidated Foods Corporation. Later, it changed its name to Sara Lee, which was already a popular product name. The company chose this name because many customers already knew it. Sara Lee was the name of the founder’s daughter.',
        'ExxonMobil',
        'ExxonMobil is a large oil company. It has changed its name several times. It was first called Standard Oil, then became Esso. Later, the company chose the name Exxon to make a unique international brand name. Finally, it merged with Mobil and became ExxonMobil.',
    ],

    'word_bank' => [
        'a. Standard Oil',
        'b. Citibank North America',
        'c. Bank Americard',
        'd. Consolidated Foods Corporation',
    ],

    'items' => [
        [
            'name'  => 'VISA',
            'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide18/visa.webp'),
            'parts' => [
                ['answer' => 'c', 'placeholder' => ''],
            ],
        ],
        [
            'name'  => 'Sara Lee',
            'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide18/sara-lee.webp'),
            'parts' => [
                ['answer' => 'd', 'placeholder' => ''],
            ],
        ],
        [
            'name'  => 'ExxonMobil',
            'image' => materialAsset('slider/B1/Intermediate/chapter-4/img/slide18/exxonmobil.webp'),
            'parts' => [
                ['answer' => 'a', 'placeholder' => ''],
            ],
        ],
    ],

    'square_images' => false,
    'image_aspect_ratio' => '4/3',
    'image_fit' => 'contain',
    'image_width_class' => 'w-[150px] sm:w-[190px] lg:w-[230px]',
    'card_flex_class' => 'flex-[1_1_320px] max-w-[420px]',
];

?>

@include('slider.game.image-missing-words', ['content' => $content])