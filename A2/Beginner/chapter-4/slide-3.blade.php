<?php
$content = [
    'page_title' => 'Practice 1',
    'title' => 'Practice 1: Warm-up',
    'subtitle' => 'Find the match',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
    'show_all_items' => true,
    'question_prompt' => '',
    'items' => [
        [
            'key' => 'chat-online',
            'text' => 'chat online',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/chat-online.webp'),
            'caption' => '',
        ],
        [
            'key' => 'dance',
            'text' => 'dance',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/dance.webp'),
            'caption' => '',
        ],
        [
            'key' => 'do-sport',
            'text' => 'do sport',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/do-sport.webp'),
            'caption' => '',
        ],
        [
            'key' => 'draw',
            'text' => 'draw',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/draw.webp'),
            'caption' => '',
        ],
        [
            'key' => 'go-shopping',
            'text' => 'go shopping',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/go-shopping.webp'),
            'caption' => '',
        ],
        [
            'key' => 'go-out-with-friends',
            'text' => 'go out with friends',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/go-out-with-friends.webp'),
            'caption' => '',
        ],
        [
            'key' => 'listen-to-music',
            'text' => 'listen to music',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/listen-to-music.webp'),
            'caption' => '',
        ],
        [
            'key' => 'play-the-guitar',
            'text' => 'play the guitar',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/play-the-guitar.webp'),
            'caption' => '',
        ],
        [
            'key' => 'read',
            'text' => 'read',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/read.webp'),
            'caption' => '',
        ],
        [
            'key' => 'surf-the-internet',
            'text' => 'surf the Internet',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/surf-the-internet.webp'),
            'caption' => '',
        ],
        [
            'key' => 'take-photos',
            'text' => 'take photos',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/take-photos.webp'),
            'caption' => '',
        ],
        [
            'key' => 'watch-films',
            'text' => 'watch films',
            'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide3/watch-films.webp'),
            'caption' => '',
        ],
    ],
];
?>

@include('slider.game.image-guess-who', ['content' => $content])