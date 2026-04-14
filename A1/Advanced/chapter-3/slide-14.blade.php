<?php
$content = [
    'title' => 'Hotel review vocabulary',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'audio-list',
            'title' => 'Word',
            'tone' => 'from-sky-400 to-blue-500',
            'items' => [
                [
                    'label' => 'clean',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/clean.mp3'),
                ],
                [
                    'label' => 'modern',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/modern.mp3'),
                ],
                [
                    'label' => 'comfortable',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/comfortable.mp3'),
                ],
                [
                    'label' => 'friendly',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/friendly.mp3'),
                ],
                [
                    'label' => 'helpful',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/helpful.mp3'),
                ],
                [
                    'label' => 'spacious',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/spacious.mp3'),
                ],
                [
                    'label' => 'excellent',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/excellent.mp3'),
                ],
                [
                    'label' => 'great',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/great.mp3'),
                ],
                [
                    'label' => 'reasonable (price)',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/reasonable-price.mp3'),
                ],
            ],
        ],
        [
            'type' => 'audio-list',
            'title' => 'Meaning',
            'tone' => 'from-purple-400 to-violet-500',
            'items' => [
                [
                    'label' => 'not dirty',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/not-dirty.mp3'),
                ],
                [
                    'label' => 'new style',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/new-style.mp3'),
                ],
                [
                    'label' => 'easy to relax in',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/easy-to-relax-in.mp3'),
                ],
                [
                    'label' => 'kind',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/kind.mp3'),
                ],
                [
                    'label' => 'ready to help',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/ready-to-help.mp3'),
                ],
                [
                    'label' => 'big',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/big.mp3'),
                ],
                [
                    'label' => 'very good',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/very-good.mp3'),
                ],
                [
                    'label' => 'very good',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/very-good.mp3'),
                ],
                [
                    'label' => 'not expensive',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-3/audios/slide14/not-expensive.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
