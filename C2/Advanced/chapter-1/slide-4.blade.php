<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Useful Language',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'        => 'To some extent',
            'subtitle' => 'Partially',
            'emoji'       => '↔️',
            'sound'       => materialAsset('slider/C2/chapter-1/audios/slide4/to-some-extent.mp3'),
            'image'       => materialAsset('slider/C2/chapter-1/img/slide4/to-some-extent.webp'),
        ],
        [
            'text'        => 'Nuanced',
            'subtitle' => 'Showing subtle differences',
            'emoji'       => '✨',
            'sound'       => materialAsset('slider/C2/chapter-1/audios/slide4/nuanced.mp3'),
            'image'       => materialAsset('slider/C2/chapter-1/img/slide4/nuanced.webp'),
        ],
        [
            'text'        => 'Fulfillment',
            'subtitle' => 'Feeling satisfied',
            'emoji'       => '😊',
            'sound'       => materialAsset('slider/C2/chapter-1/audios/slide4/fulfillment.mp3'),
            'image'       => materialAsset('slider/C2/chapter-1/img/slide4/fulfillment.webp'),
        ],
        [
            'text'        => 'Perspective',
            'subtitle' => 'Point of view',
            'emoji'       => '👁️',
            'sound'       => materialAsset('slider/C2/chapter-1/audios/slide4/perspective.mp3'),
            'image'       => materialAsset('slider/C2/chapter-1/img/slide4/perspective.webp'),
        ],
        [
            'text'        => 'Diplomatically',
            'subtitle' => 'Politely and carefully',
            'emoji'       => '🤝',
            'sound'       => materialAsset('slider/C2/chapter-1/audios/slide4/diplomatically.mp3'),
            'image'       => materialAsset('slider/C2/chapter-1/img/slide4/diplomatically.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
