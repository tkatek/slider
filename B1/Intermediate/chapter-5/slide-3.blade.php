<?php
$content = [
    'title'    => 'Practice 1',
    'subtitle' => 'Match the logo with the slogan:',
    'type'     => 'image',

    'categories' => [
        "Levi's" => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/levis.webp'),
            'items' => ["Share Moments, Share Life"],
        ],
        'HSBC' => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/hsbc.webp'),
            'items' => ["The world’s local bank."],
        ],
        'Nike' => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/nike.webp'),
            'items' => ['Just do it.'],
        ],
        'Mercedes-Benz' => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/mercedes-benz.webp'),
            'items' => ['Quality never goes out of style.'],
        ],
        'Kodak' => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/kodak.webp'),
            'items' => ['Share Moments, Share Life'],
        ],
        'Apple' => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/apple.webp'),
            'items' => ['Think Different'],
        ],
        'KFC' => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/kfc.webp'),
            'items' => ["Finger lickin' good."],
        ],
        'Volkswagen' => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/volkswagen.webp'),
            'items' => ['Das Auto (The Car)'],
        ],
        'Mastercard' => [
            'image' => materialAsset('slider/B1/Intermediate/chapter-5/img/slide3/mastercard.webp'),
            'items' => ['There are some things money can’t buy. For everything else, there’s...'],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])