<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => '',

    'groups' => [
        [
            'key' => 'positive-adjectives',
            'title' => 'Positive adjectives',
            'grid_class' => 'grid-cols-2 sm:grid-cols-5 lg:grid-cols-5',
            'items' => [
                [
                    'text' => 'stimulating',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/stimulating.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/stimulating.webp'),
                ],
                [
                    'text' => 'satisfying',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/satisfying.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/satisfying.webp'),
                ],
                [
                    'text' => 'creative',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/creative.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/creative.webp'),
                ],
                [
                    'text' => 'rewarding',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/rewarding.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/rewarding.webp'),
                ],
                [
                    'text' => 'challenging',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/challenging.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/challenging.webp'),
                ],
            ],
        ],
        [
            'key' => 'negative-adjectives',
            'title' => 'Negative adjectives',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items' => [
                [
                    'text' => 'exhausting',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/exhausting.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/exhausting.webp'),
                ],
                [
                    'text' => 'thankless',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/thankless.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/thankless.webp'),
                ],
                [
                    'text' => 'mind numbing',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/mind numbing.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/mind-numbing.webp'),
                ],
                [
                    'text' => 'dead end job',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide10/dead end job.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide10/dead-end-job.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])