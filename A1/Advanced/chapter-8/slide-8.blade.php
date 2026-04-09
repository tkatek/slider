<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'allow_html_subtitles' => true,
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [

        [
            'text' => 'Roomy',
            'subtitle' => 'Having plenty of space; spacious.',
            'emoji' => '🏠',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/roomy.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/roomy.webp'),
        ],

        [
            'text' => 'Mix of people',
            'subtitle' => 'A variety of different types of residents (ages, backgrounds).',
            'emoji' => '👥',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/mix-of-people.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/mix-of-people.webp'),
        ],

        [
            'text' => 'Cultures',
            'subtitle' => 'The customs, arts, and social institutions of particular nations or groups.',
            'emoji' => '🌍',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/cultures.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/cultures.webp'),
        ],

        [
            'text' => 'Public transportation',
            'subtitle' => 'Systems like buses and trains used by the public to travel.',
            'emoji' => '🚌',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/public-transportation.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/public-transportation.webp'),
        ],

        [
            'text' => 'Downtown',
            'subtitle' => 'The central part or main business district of a city.',
            'emoji' => '🏙️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/downtown.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/downtown.webp'),
        ],

        [
            'text' => 'Eat out',
            'subtitle' => 'To dine at a restaurant rather than at home.',
            'emoji' => '🍽️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/eat-out.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/eat-out.webp'),
        ],

        [
            'text' => 'Furniture store',
            'subtitle' => 'A shop that sells items for a house.',
            'emoji' => '🛋️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/furniture-store.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/furniture-store.webp'),
        ],

        [
            'text' => 'Jewelry store',
            'subtitle' => 'A shop that sells necklaces, rings, and other decorative items.',
            'emoji' => '💍',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/jewelry-store.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/jewelry-store.webp'),
        ],

        [
            'text' => 'Grocery store',
            'subtitle' => 'A shop that sells food and household goods.',
            'emoji' => '🛒',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/grocery-store.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/grocery-store.webp'),
        ],

        [
            'text' => 'Safe',
            'subtitle' => 'A place or situation where you feel protected from harm.',
            'emoji' => '🛡️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/safe.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/safe.webp'),
        ],

        [
            'text' => 'Book store',
            'subtitle' => 'A shop that sells books for reading or studying.',
            'emoji' => '📚',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/book-store.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/book-store.webp'),
        ],

        [
            'text' => 'Movie theatre',
            'subtitle' => 'A place where people watch films on a big screen.',
            'emoji' => '🎬',
            'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide8/movie-theatre.mp3'),
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide8/movie-theatre.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])