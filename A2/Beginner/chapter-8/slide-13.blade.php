<?php
$content = [
    'page_title' => 'Practice 4',
    'title' => 'Practice 4',
    'subtitle' => 'What are they like?',
    'practice_note' => 'Use the vocabulary from the box to describe these people
    ',

    'type' => 'image',
    'desktop_game_width' => 90,
    'desktop_pool_width' => 90,

    'categories' => [
        'funny' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide13/funny.webp'),
            'items' => ['funny'],
        ],
        'busy' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide13/busy.webp'),
            'items' => ['busy'],
        ],
        'sporty' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide13/sporty.webp'),
            'items' => ['sporty'],
        ],
        'talkative' => [
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide13/talkative.webp'),
            'items' => ['talkative'],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])