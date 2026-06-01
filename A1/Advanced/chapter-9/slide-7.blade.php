<?php
$content = [

    'title'                 => 'Practice 3: New Vocabulary',
    'subtitle'              => '1️⃣Places in a town<br>Match the word and pictures',
    'type'                  => 'image',


    'categories' => [
        'Café' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/cafe.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/cafe.mp3'),
            'items' => ['Café'],
        ],
        'Train station' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/train-station.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/train-station.mp3'),
            'items' => ['Train station'],
        ],
        'Castle' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/castle.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/castle.mp3'),
            'items' => ['Castle'],
        ],
        'Sports centre' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/sports-centre.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/sports-centre.mp3'),
            'items' => ['Sports centre'],
        ],
        'Bank' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/bank.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/bank.mp3'),
            'items' => ['Bank'],
        ],
        'Library' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/library.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/library.mp3'),
            'items' => ['Library'],
        ],
        'School' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/school.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/school.mp3'),
            'items' => ['School'],
        ],
        'Post office' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/post-office.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/post-office.mp3'),
            'items' => ['Post office'],
        ],
        'Factory' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/factory.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/factory.mp3'),
            'items' => ['Factory'],
        ],
        'Cinema' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/cinema.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/cinema.mp3'),
            'items' => ['Cinema'],
        ],
        'Bus stop' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/bus-stop.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/bus-stop.mp3'),
            'items' => ['Bus stop'],
        ],
        'Supermarket' => [
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/supermarket.webp'),
            'sound' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide7/supermarket.mp3'),
            'items' => ['Supermarket'],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
