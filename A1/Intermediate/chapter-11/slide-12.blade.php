<?php
$content = [
    'page_title' => 'Practise Time',
    'title' => 'Practise Time',
    'subtitle' => 'Drag and Drop',
    'pool_item_type' => 'image',
    'desktop_game_width' => 55,
    'desktop_pool_width' => 45,
    'categories' => [
        'In the tray' => [
            'emoji' => '🛂',
            'items' => [
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/smaller-bags.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/laptop.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/coins.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/belts.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/watches.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/keys.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/cell-phone.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/liquids-under.webp'),
            ],
        ],
        'Forbidden items' => [
            'emoji' => '🚫',
            'items' => [
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/scissors.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/liquids-over.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/knives.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/box-cutter.webp'),
                materialAsset('slider/A1/Intermediate/chapter-11/img/slide12/flammable-liquids.webp'),
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
