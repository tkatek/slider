<?php
$content = [
    'title'         => 'Warm Up: Practice 1',
    'subtitle'      => 'What can we do at the beach?<br>Match the pictures with the activities',
    'type'          => 'image',

    'categories' => [
        'Snorkelling' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/snorkelling.webp'),
            'items' => ['Snorkelling'],
        ],
        'Windsurfing' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/windsurfing.webp'),
            'items' => ['Windsurfing'],
        ],
        'Get Sunburn' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/get-sunburn.webp'),
            'items' => ['Get Sunburn'],
        ],
        'Sunbathing' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/sunbathing.webp'),
            'items' => ['Sunbathing'],
        ],
        'Diving' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/diving.webp'),
            'items' => ['Diving'],
        ],
        'Get A Suntan' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/get-a-suntan.webp'),
            'items' => ['Get A Suntan'],
        ],
        'Boating' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/boating.webp'),
            'items' => ['Boating'],
        ],
        'Stroll Along The Beach' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/stroll-along-the-beach.webp'),
            'items' => ['Stroll Along The Beach'],
        ],
        'Beach Games' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/beach-games.webp'),
            'items' => ['Beach Games'],
        ],
        'Yachting' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/yachting.webp'),
            'items' => ['Yachting'],
        ],
        'Surfing' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide4/surfing.webp'),
            'items' => ['Surfing'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])