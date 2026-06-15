<?php
$content = [
    'title'         => 'What do you like to take to the beach?',
    'subtitle'      => 'Drag & drop each word under the correct picture:',
    'type'          => 'image',

    'categories' => [
        'Boat' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/boat.webp'),
            'items' => ['Boat'],
        ],
        'Sun Hat' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/sun-hat.webp'),
            'items' => ['Sun Hat'],
        ],
        'Bag' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/bag.webp'),
            'items' => ['Bag'],
        ],
        'Towel' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/towel.webp'),
            'items' => ['Towel'],
        ],
        'Sand' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/sand.webp'),
            'items' => ['Sand'],
        ],
        'Sunglasses' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/sunglasses.webp'),
            'items' => ['Sunglasses'],
        ],
        'Surf' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/surfing.webp'),
            'items' => ['Surf'],
        ],
        'Surfboard' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/surfboard.webp'),
            'items' => ['Surfboard'],
        ],
        'Sun Cream' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/sun-cream.webp'),
            'items' => ['Sun Cream'],
        ],
        'Wave' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/wave.webp'),
            'items' => ['Wave'],
        ],
        'Shell' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/shell.webp'),
            'items' => ['Shell'],
        ],
        'Crab' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide17/crab.webp'),
            'items' => ['Crab'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])