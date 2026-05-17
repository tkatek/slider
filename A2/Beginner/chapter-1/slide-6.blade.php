<?php
$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4',

    'items' => [

        [
            'text'     => 'Sunny',
            'subtitle' => 'The sun is shining brightly today.',
            'emoji'    => '☀️',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-1/audios/slide6/sunny.mp3'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/sunny.webp'),
        ],

        [
            'text'     => 'Rainy',
            'subtitle' => 'It’s a perfect day for staying indoors.',
            'emoji'    => '🌧️',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-1/audios/slide6/rainy.mp3'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/rainy.webp'),
        ],

        [
            'text'     => 'Cloudy',
            'subtitle' => 'The sky is gray and overcast today.',
            'emoji'    => '☁️',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-1/audios/slide6/cloudy.mp3'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/cloudy.webp'),
        ],

        [
            'text'     => 'Windy',
            'subtitle' => "Hold onto your hats; it's quite breezy!",
            'emoji'    => '💨',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-1/audios/slide6/windy.mp3'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/windy.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
