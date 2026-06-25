<?php
$content = [
    'title' => 'Practice 3',
    'subtitle' => "Drag and drop each keyword next to its definition",
    'type' => 'image',

    'categories' => [
        "I've got a really bad cold." => [
            'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide11/bad-cold.webp'),
            'items' => ["If I were you, I'd see a doctor."],
        ],
        "I can't sleep at night." => [
            'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide11/cant-sleep-at-night.webp'),
            'items' => ["If I were you, I'd drink less coffee."],
        ],
        "I want to go to university." => [
            'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide11/go-to-university.webp'),
            'items' => ["If I were you, I'd study harder."],
        ],
        "Someone has stolen my purse." => [
            'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide11/stolen-purse.webp'),
            'items' => ["If I were you, I'd call the police."],
        ],
        "I want to lose weight." => [
            'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide11/lose-weight.webp'),
            'items' => ["If I were you, I'd go on a diet."],
        ],
        "I'd like to go on holiday this summer." => [
            'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide11/holiday-this-summer.webp'),
            'items' => ["If I were you, I'd start saving some money."],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])