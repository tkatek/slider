<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => '',

    'groups' => [
        [
            'key' => 'tools-equipment-1',
            'title' => 'Tools & Equipment (Key Vocabulary)',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5',
            'items' => [
                [
                    'text' => 'stethoscope',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/stethoscope.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/stethoscope.webp'),
                ],
                [
                    'text' => 'thermometer',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/thermometer.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/thermometer.webp'),
                ],
                [
                    'text' => 'syringe',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/syringe.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/syringe.webp'),
                ],
                [
                    'text' => 'gloves',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/gloves.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/gloves.webp'),
                ],
                [
                    'text' => 'medicine',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/medicine.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/medicine.webp'),
                ],
                [
                    'text' => 'whiteboard',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/whiteboard.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/whiteboard.webp'),
                ],
                [
                    'text' => 'handcuffs',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/handcuffs.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/handcuffs.webp'),
                ],
                [
                    'text' => 'whistle',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/whistle.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/whistle.webp'),
                ],
                [
                    'text' => 'a fire hose',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/a-fire-hose.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/fire-hose.webp'),
                ],
                [
                    'text' => 'helmet',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/helmet.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/helmet.webp'),
                ],
                [
                    'text' => 'tractor',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/tractor.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/tractor.webp'),
                ],
                [
                    'text' => 'plough',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/plough.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/plough.webp'),
                ],
                [
                    'text' => 'hammer',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/hammer.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/hammer.webp'),
                ],
                [
                    'text' => 'mailbag',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/mailbag.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/mailbag.webp'),
                ],
                [
                    'text' => 'knife',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/knife.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/knife.webp'),
                ],
                [
                    'text' => 'frying pan',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/frying-pan.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/frying-pan.webp'),
                ],
                [
                    'text' => 'apron',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide8/apron.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide8/apron.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
