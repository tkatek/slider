<?php
$content = [

    'title' => 'New Vocabulary',
    'subtitle' => 'Actions (Verbs)',
    'image_text_style' => 'overlay',

    'groups' => [
        [
            'key' => '',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',
            'items' => [
                [
                    'text' => 'use',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/use.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/use.webp'),
                ],
                [
                    'text' => 'check',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/check.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/check.webp'),
                ],
                [
                    'text' => 'treat',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/treat.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/treat.webp'),
                ],
                [
                    'text' => 'care for',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/care-for.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/care-for.webp'),
                ],
                [
                    'text' => 'teach',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/teach.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/teach.webp'),
                ],
                [
                    'text' => 'keep (people safe)',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/keep.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/keep-people-safe.webp'),
                ],
                [
                    'text' => 'put out (fires)',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/put-out.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/put-out-fires.webp'),
                ],
                [
                    'text' => 'grow (crops)',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/grow.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/grow-crops.webp'),
                ],
                [
                    'text' => 'build',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/build.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/build.webp'),
                ],
                [
                    'text' => 'deliver',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/deliver.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/deliver.webp'),
                ],
                [
                    'text' => 'cook',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide9/cook.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide9/cook.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
