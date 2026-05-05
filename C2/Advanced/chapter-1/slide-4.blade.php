<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',

    'groups' => [
        [
            'key' => 'advanced-opinion-vocabulary',
            'title' => 'Useful Language',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',
            'items' => [
                [
                    'text' => 'To some extent',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide4/to-some-extent.mp3'),
                    'image' => materialAsset('slider/C2/Advanced/chapter-1/img/slide4/to-some-extent.webp'),
                ],
                [
                    'text' => 'Nuanced',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide4/nuanced.mp3'),
                    'image' => materialAsset('slider/C2/Advanced/chapter-1/img/slide4/nuanced.webp'),
                ],
                [
                    'text' => 'Fulfillment',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide4/fulfillment.mp3'),
                    'image' => materialAsset('slider/C2/Advanced/chapter-1/img/slide4/fulfillment.webp'),
                ],
                [
                    'text' => 'Perspective',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide4/perspective.mp3'),
                    'image' => materialAsset('slider/C2/Advanced/chapter-1/img/slide4/perspective.webp'),
                ],
                [
                    'text' => 'Diplomatically',
                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide4/diplomatically.mp3'),
                    'image' => materialAsset('slider/C2/Advanced/chapter-1/img/slide4/diplomatically.webp'),
                ],
                [
                    'text' => 'To some extent',
                    'description' => 'Partially',

                    'sound' => materialAsset('slider/C2/Advanced/chapter-1/audios/slide4/diplomatically.mp3'),
                    'image' => materialAsset('slider/C2/Advanced/chapter-1/img/slide4/diplomatically.webp'),
                ],

            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
