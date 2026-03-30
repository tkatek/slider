<?php
$content = [
    'page_title' => 'Key Vocabulary',
    'title'      => 'Key Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',

    'items'      => [
        [
            'text'  => 'Next to',
            'emoji' => '➡️',
            'sound' => materialAsset("slider/A1/Beginner/chapter-7/audios/slide7/next-to.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-7/img/slide7/next-to.webp'),
        ],
        [
            'text'  => 'Opposite',
            'emoji' => '↔️',
            'sound' => materialAsset("slider/A1/Beginner/chapter-7/audios/slide7/opposite.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-7/img/slide7/opposite.webp'),
        ],
        [
            'text'  => 'Turn right',
            'emoji' => '➡️',
            'sound' => materialAsset("slider/A1/Beginner/chapter-7/audios/slide7/turn-right.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-7/img/slide7/turn-right.webp'),
        ],
        [
            'text'  => 'Turn left',
            'emoji' => '⬅️',
            'sound' => materialAsset("slider/A1/Beginner/chapter-7/audios/slide7/turn-left.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-7/img/slide7/turn-left.webp'),
        ],
        [
            'text'  => 'Go straight on',
            'emoji' => '⬆️',
            'sound' => materialAsset("slider/A1/Beginner/chapter-7/audios/slide7/go-straight-on.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-7/img/slide7/go-straight-on.webp'),
        ],
        [
            'text'  => 'Around the corner',
            'emoji' => '↪️',
            'sound' => materialAsset("slider/A1/Beginner/chapter-7/audios/slide7/around-the-corner.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-7/img/slide7/around-the-corner.webp'),
        ],
        [
            'text'  => 'In front of',
            'emoji' => '🔼',
            'sound' => materialAsset("slider/A1/Beginner/chapter-7/audios/slide7/in-front-of.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-7/img/slide7/in-front-of.webp'),
        ],
        [
            'text'  => 'Behind',
            'emoji' => '🔽',
            'sound' => materialAsset("slider/A1/Beginner/chapter-7/audios/slide7/behind.mp3"),
            'image' => materialAsset('slider/A1/Beginner/chapter-7/img/slide7/behind.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-emoji-audio", ['content' => $content])