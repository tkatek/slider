<?php
$content = [
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [

        [
            'text' => 'genre',
            'subtitle' => 'a type or category of movie',
            'emoji' => '🎞️',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/genre.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/genre.webp'),
        ],

        [
            'text' => 'action movie',
            'subtitle' => 'a movie with exciting scenes and danger',
            'emoji' => '💥',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/action-movie.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/action-movie.webp'),
        ],

        [
            'text' => 'horror movie',
            'subtitle' => 'a scary movie',
            'emoji' => '👻',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/horror-movie.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/horror-movie.webp'),
        ],

        [
            'text' => 'comedy',
            'subtitle' => 'a funny movie',
            'emoji' => '😂',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/comedy.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/comedy.webp'),
        ],

        [
            'text' => 'drama',
            'subtitle' => 'a serious emotional movie',
            'emoji' => '🎭',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/drama.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/drama.webp'),
        ],

        [
            'text' => 'sci-fi movie',
            'subtitle' => 'a science fiction movie about the future',
            'emoji' => '🚀',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/sci-fi-movie.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/sci-fi-movie.webp'),
        ],

        [
            'text' => 'documentary',
            'subtitle' => 'a film about real people or events',
            'emoji' => '📹',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/documentary.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/documentary.webp'),
        ],

        [
            'text' => 'lead role',
            'subtitle' => 'the main acting role',
            'emoji' => '🌟',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/lead-role.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/lead-role.webp'),
        ],

        [
            'text' => 'supporting role',
            'subtitle' => 'an important but not main role',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/supporting-role.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/supporting-role.webp'),
        ],

        [
            'text' => 'stuntman',
            'subtitle' => 'a person who performs dangerous scenes',
            'emoji' => '🏍️',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/stuntman.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/stuntman.webp'),
        ],

        [
            'text' => 'extras',
            'subtitle' => 'actors in the background',
            'emoji' => '👥',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/extras.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/extras.webp'),
        ],

        [
            'text' => 'cast',
            'subtitle' => 'all the actors in a movie',
            'emoji' => '🎬',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/cast.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/cast.webp'),
        ],

        [
            'text' => 'plot',
            'subtitle' => 'the main story of a movie',
            'emoji' => '📖',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/plot.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/plot.webp'),
        ],

        [
            'text' => 'trailer',
            'subtitle' => 'a short preview of a movie',
            'emoji' => '🍿',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/trailer.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/trailer.webp'),
        ],

        [
            'text' => 'special effects',
            'subtitle' => 'visual effects used in movies',
            'emoji' => '✨',
            'sound' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide7/special-effects.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide7/special-effects.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])