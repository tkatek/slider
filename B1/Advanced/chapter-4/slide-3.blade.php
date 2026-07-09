<?php

$content = [
    'title'    => 'Warm Up: Practice 1',
    'subtitle' => 'Match the pictures with the words',
    'type'     => 'image',

    'categories' => [
        '1' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/climate-change.webp'),
            'items' => ['climate change'],
        ],
        '2' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/deforestation.webp'),
            'items' => ['deforestation'],
        ],
        '3' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/air-pollution.webp'),
            'items' => ['air pollution'],
        ],
        '4' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/water-pollution.webp'),
            'items' => ['water pollution'],
        ],
        '5' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/plastic-waste.webp'),
            'items' => ['plastic waste'],
        ],
        '6' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/drought.webp'),
            'items' => ['drought'],
        ],
        '7' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/flood.webp'),
            'items' => ['flood'],
        ],
        '8' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/wildfire.webp'),
            'items' => ['wildfire'],
        ],
        '9' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/endangered-species.webp'),
            'items' => ['endangered species'],
        ],
        '10' => [
            'image' => materialAsset('slider/B1/Advanced/chapter-4/img/slide3/recycling.webp'),
            'items' => ['recycling'],
        ],
    ],
];

?>

@include('slider.game.drag-and-drop', ['content' => $content])