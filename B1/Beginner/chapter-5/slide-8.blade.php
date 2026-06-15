<?php
$content = [
    'title'      => 'New Language Expressions',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',

    'items' => [

        [
            'text' => 'famous for their piers',
            'subtitle' => 'well known because of their piers',
            'emoji' => '🌉',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/famous-for-their-piers.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/famous-for-their-piers.webp'),
        ],

        [
            'text' => 'walk out over the sea',
            'subtitle' => 'walk above the sea on a pier',
            'emoji' => '🚶',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/walk-out-over-the-sea.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/walk-out-over-the-sea.webp'),
        ],

        [
            'text' => 'felt like being on a ship',
            'subtitle' => 'seemed similar to being on a boat',
            'emoji' => '🚢',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/felt-like-being-on-a-ship.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/felt-like-being-on-a-ship.webp'),
        ],

        [
            'text' => 'traditional shows',
            'subtitle' => 'old and popular entertainment',
            'emoji' => '🎭',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/traditional-shows.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/traditional-shows.webp'),
        ],

        [
            'text' => 'steals the sausages',
            'subtitle' => 'takes the sausages without permission',
            'emoji' => '🌭',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/steals-the-sausages.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/steals-the-sausages.webp'),
        ],

        [
            'text' => 'laugh and run away',
            'subtitle' => 'react happily and leave quickly',
            'emoji' => '😂',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/laugh-and-run-away.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/laugh-and-run-away.webp'),
        ],

        [
            'text' => 'modern attractions',
            'subtitle' => 'new entertainment activities or places',
            'emoji' => '🎢',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/modern-attractions.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/modern-attractions.webp'),
        ],

        [
            'text' => 'fast and exciting',
            'subtitle' => 'full of action and fun',
            'emoji' => '⚡',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/fast-and-exciting.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/fast-and-exciting.webp'),
        ],

        [
            'text' => 'improve quick reactions',
            'subtitle' => 'help people react faster',
            'emoji' => '🎯',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/improve-quick-reactions.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/improve-quick-reactions.webp'),
        ],

        [
            'text' => 'help fitness',
            'subtitle' => 'improve health and physical condition',
            'emoji' => '💪',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/help-fitness.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/help-fitness.webp'),
        ],

        [
            'text' => 'not a full replacement',
            'subtitle' => 'not completely the same as something else',
            'emoji' => '🔁',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/not-a-full-replacement.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/not-a-full-replacement.webp'),
        ],

        [
            'text' => 'many kinds of fun',
            'subtitle' => 'different types of entertainment',
            'emoji' => '🎉',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide8/many-kinds-of-fun.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide8/many-kinds-of-fun.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])