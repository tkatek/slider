<?php
$content = [
    'title'         => 'Warm up:  Practice 1',
    'subtitle'      => 'Match the picture with the definition',
    'type' => 'image',
    'categories' => [
        'To sing karaoke' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/karaoke.webp'),
            'items' => ['To sing karaoke'],
        ],
        'To be addicted to gambling' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/gambling.webp'),
            'items' => ['To be addicted to gambling'],
        ],
        'To listen to music' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/music.webp'),
            'items' => ['To listen to music'],
        ],
        'To do sport' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/sport.webp'),
            'items' => ['To do sport'],
        ],
        'To go to an art gallery' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/gallery.webp'),
            'items' => ['To go to an art gallery'],
        ],
        'To go to an amusement park' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/park.webp'),
            'items' => ['To go to an amusement park'],
        ],
        'To go to the theatre' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/theatre.webp'),
            'items' => ['To go to the theatre'],
        ],
        'To go to the cinema' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/cinema.webp'),
            'items' => ['To go to the cinema'],
        ],
        'To go to a museum' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/museum.webp'),
            'items' => ['To go to a museum'],
        ],
        'To go to the circus' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/circus.webp'),
            'items' => ['To go to the circus'],
        ],
        'To read books' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/books.webp'),
            'items' => ['To read books'],
        ],
        'To watch TV shows' => [
            'image' => materialAsset('slider/B1/Beginner/chapter-4/img/slide3/tv.webp'),
            'items' => ['To watch TV shows'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])