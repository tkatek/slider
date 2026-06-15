<?php
$content = [
    'title'    => 'Warm Up: Practice 1',
    'subtitle' => 'Are these activities indoor or outdoor activities?<br>Match the picture with the suitable activity:',
    'type'     => 'image',

    'categories' => [
        'Walk On The Pier' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide3/walk-on-the-pier.webp'),
            'items' => ['Walk On The Pier'],
        ],
        'Build A Sandcastle' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide3/build-a-sandcastle.webp'),
            'items' => ['Build A Sandcastle'],
        ],
        'Eat Fish & Chips' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide3/eat-fish-and-chips.webp'),
            'items' => ['Eat Fish & Chips'],
        ],
        'Put On Sun Cream' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide3/put-on-sun-cream.webp'),
            'items' => ['Put On Sun Cream'],
        ],
        'Go Surfing' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide3/go-surfing.webp'),
            'items' => ['Go Surfing'],
        ],
        'Collect Shells' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide3/collect-shells.webp'),
            'items' => ['Collect Shells'],
        ],
        'Fly A Kite' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide3/fly-a-kite.webp'),
            'items' => ['Fly A Kite'],
        ],
        'Have A Tan' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide3/have-a-tan.webp'),
            'items' => ['Have A Tan'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])