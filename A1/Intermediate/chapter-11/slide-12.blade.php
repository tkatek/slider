<?php
$content = [
    'title' => 'Practise Time',
    'subtitle' => 'Drag and Drop',
    'pool_item_type' => 'image',
    'image_text_style' => 'overlay',

    'categories' => [
        'In the tray' => [
            'emoji' => '🛂',
            'items' => [
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/smaller-bags.webp'),
                    'text'  => 'Smaller bags',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/laptop.webp'),
                    'text'  => 'Laptop',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/coins.webp'),
                    'text'  => 'Coins',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/belts.webp'),
                    'text'  => 'Belts',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/watches.webp'),
                    'text'  => 'Watches',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/keys.webp'),
                    'text'  => 'Keys',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/cell-phone.webp'),
                    'text'  => 'Cell phone',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/liquids-under.webp'),
                    'text'  => 'Liquids up to 100ml',
                ],
            ],
        ],
        'Forbidden items' => [
            'emoji' => '🚫',
            'items' => [
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/scissors.webp'),
                    'text'  => 'Scissors',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/liquids-over.webp'),
                    'text'  => 'Liquids over 100ml',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/knives.webp'),
                    'text'  => 'Knives',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/box-cutter.webp'),
                    'text'  => 'Box cutter',
                ],
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/flammable-liquids.webp'),
                    'text'  => 'Flammable liquids',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])