<?php
$content = [
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [

        [
            'text' => 'favor',
            'subtitle' => 'help that you ask someone to do',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/favor.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/favor.webp'),
        ],

        [
            'text' => 'take care of',
            'subtitle' => 'look after something or someone',
            'emoji' => '🧡',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/take-care-of.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/take-care-of.webp'),
        ],

        [
            'text' => 'while I’m gone',
            'subtitle' => 'during the time I am away',
            'emoji' => '🧳',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/while-im-gone.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/while-im-gone.webp'),
        ],

        [
            'text' => 'feed',
            'subtitle' => 'give food to',
            'emoji' => '🍽️',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/feed.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/feed.webp'),
        ],

        [
            'text' => 'water the plants',
            'subtitle' => 'give water to plants',
            'emoji' => '🪴',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/water-the-plants.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/water-the-plants.webp'),
        ],

        [
            'text' => 'lend',
            'subtitle' => 'give something temporarily',
            'emoji' => '📦',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/lend.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/lend.webp'),
        ],

        [
            'text' => 'gone away',
            'subtitle' => 'left for a short time',
            'emoji' => '🚶',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/gone-away.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/gone-away.webp'),
        ],

        [
            'text' => 'homework',
            'subtitle' => 'school work students do at home',
            'emoji' => '📚',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/homework.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/homework.webp'),
        ],

        [
            'text' => 'report',
            'subtitle' => 'a written piece of work',
            'emoji' => '📄',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/report.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/report.webp'),
        ],

        [
            'text' => 'move into',
            'subtitle' => 'start living in a new place',
            'emoji' => '🏠',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide5/move-into.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-1/img/slide5/move-into.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])