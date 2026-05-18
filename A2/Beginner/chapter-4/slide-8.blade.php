<?php
$content = [

    'title' => 'New Vocabulary',
    'subtitle' => '',
    'groups' => [
        [
            'key' => 'weekend-activities',
            'title' => 'Weekend Activities',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
            'items' => [
                [
                    'text' => 'Go shopping',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/go-shopping.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/shopping.webp'),
                ],
                [
                    'text' => 'Play tennis',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/play-tennis.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/tennis.webp'),
                ],
                [
                    'text' => 'Watch a movie',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/watch-a-movie.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/movie.webp'),
                ],
            ],
        ],
        [
            'key' => 'chores',
            'title' => 'Chores',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
            'items' => [
                [
                    'text' => 'Wash dishes',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/wash-dishes.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/wash.webp'),
                ],
                [
                    'text' => 'Vacuum',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/vacuum.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/vacuum.webp'),
                ],
                [
                    'text' => 'Mop',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/mop.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/mop.webp'),
                ],
                [
                    'text' => 'Clean',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/clean.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/clean.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
