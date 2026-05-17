<?php
$content = [

    'title'      => 'New Vocabulary 2',
    'subtitle'   => 'More Weather Words',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [

        [
            'text'     => 'Snowy',
            'subtitle' => 'It’s snowy when white flakes fall gently.',
            'emoji'    => '❄️',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-1/audios/slide6/snowy.mp3'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/snowy.webp'),
        ],

        [
            'text'     => 'Stormy',
            'subtitle' => 'Stormy weather includes rain and strong winds.',
            'emoji'    => '⛈️',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-1/audios/slide6/stormy.mp3'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/stormy.webp'),
        ],

        [
            'text'     => 'Hot',
            'subtitle' => 'It’s hot when the sun shines brightly.',
            'emoji'    => '🌞',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-1/audios/slide6/hot.mp3'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/hot.webp'),
        ],

        [
            'text'     => 'Cold',
            'subtitle' => 'It’s cold when temperatures drop significantly.',
            'emoji'    => '🥶',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-1/audios/slide6/cold.mp3'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/cold.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])