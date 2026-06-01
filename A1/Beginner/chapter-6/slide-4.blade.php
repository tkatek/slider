<?php
$content = [
    'title' => 'Can you tell the time?',
    'subtitle' => 'Drag & Drop',
    'type' => 'image',

    'categories' => [
        '02:00' => [
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/2.webp'),
            'items' => ["It's two o'clock."],
        ],
        '05:00' => [
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/5.webp'),
            'items' => ["It's five o'clock."],
        ],
        '02:30' => [
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/2-30.webp'),
            'items' => ["It's half past two."],
        ],
        '09:30' => [
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/9-30.webp'),
            'items' => ["It's half past nine."],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
