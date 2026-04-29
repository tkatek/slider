<?php
$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Warm-up: Practice 1',
    'subtitle'   => 'Healthy or unhealthy?',
    'practice_note' => 'Drag & drop each item in the right column',
    'pool_item_type' => 'image',
    'desktop_game_width' => 55,
    'desktop_pool_width' => 45,
    'categories' => [
        'Healthy' => [
            'items' => [
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Strawberry.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Apple.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Banana.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Lettuce.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Broccoli.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Orange.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Cucumber.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Potato.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Carrot.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Watermelon.webp'),
            ],
        ],
        'Unhealthy' => [
            'items' => [
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Cake.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Fries.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Bacon.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Sweets.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Crisps.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Pizza.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Ice-cream.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Hotdog.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Burger.webp'),
                materialAsset('slider/A2/Beginner/chapter-10/img/slide3/Chocolate.webp'),
            ],
        ],
    ],
];
?>
@include('slider.game.drag-and-drop', ['content' => $content])