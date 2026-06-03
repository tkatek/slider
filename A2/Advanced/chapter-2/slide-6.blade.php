<?php
$content = [

    'title' => 'New Vocabulary',
    'subtitle' => '',
    'image_text_style' => 'overlay',

    'groups' => [
        [
            'key' => 'jobs',
            'title' => 'Jobs',
            'grid_class' => 'grid-cols-2 sm:grid-cols-5 lg:grid-cols-5',
            'items' => [
                [
                    'text' => 'professional sleeper',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/professional-sleeper.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/professional-sleeper.webp'),
                ],
                [
                    'text' => 'pet food taster',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/pet-food-taster.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/pet-food-taster.webp'),
                ],
                [
                    'text' => 'water slide tester',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/water-slide-tester.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/water-slide-tester.webp'),
                ],
                [
                    'text' => 'professional mourner',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/professional-mourner.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/professional-mourner.webp'),
                ],
                [
                    'text' => 'paper towel sniffer',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/paper-towel-sniffer.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/paper-towel-sniffer.webp'),
                ],
            ],
        ],
        [
            'key' => 'work-actions',
            'title' => 'Work & Actions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items' => [
                [
                    'text' => 'test (beds / products)',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/test.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/test.webp'),
                ],
                [
                    'text' => 'taste (food)',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/taste.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/taste.webp'),
                ],
                [
                    'text' => 'travel',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/travel.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/travel.webp'),
                ],
                [
                    'text' => 'check',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/check.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/check.webp'),
                ],
                [
                    'text' => 'try / rate (slides)',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/try-rate.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/try-rate.webp'),
                ],
                [
                    'text' => 'work',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/work.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/work.webp'),
                ],
                [
                    'text' => 'sniff (towels)',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-2/audios/slide6/sniff.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide6/sniff.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])