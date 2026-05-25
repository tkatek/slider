@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => 'Ancient Egyptian Cats',

        'image_text_style' => 'overlay',

        'groups' => [
            [
                'title' => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-5',
                'items' => [
                    [
                        'text'  => 'catch',
                        'emoji' => '🫴',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/catch.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/catch.mp3'),
                    ],
                    [
                        'text'  => 'sacred',
                        'emoji' => '✨',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/sacred.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/sacred.mp3'),
                    ],
                    [
                        'text'  => 'goddess',
                        'emoji' => '👑',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/goddess.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/goddess.mp3'),
                    ],
                    [
                        'text'  => 'jewellery',
                        'emoji' => '💍',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/jewellery.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/jewellery.mp3'),
                    ],
                    [
                        'text'  => 'fertility',
                        'emoji' => '🌱',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/fertility.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/fertility.mp3'),
                    ],
                    [
                        'text'  => 'joy',
                        'emoji' => '😊',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/joy.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/joy.mp3'),
                    ],
                    [
                        'text'  => 'mummify',
                        'emoji' => '🏺',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/mummify.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/mummify.mp3'),
                    ],
                    [
                        'text'  => 'ornament',
                        'emoji' => '🪬',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/ornament.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/ornament.mp3'),
                    ],
                    [
                        'text'  => 'fortune',
                        'emoji' => '🍀',
                        'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide18/fortune.webp'),
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/fortune.mp3'),
                    ],
                ],
            ],
            [
                'title' => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4',
                'items' => [
                    [
                        'text'  => 'by accident',
                        'emoji' => '⚠️',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/by-accident.mp3'),
                    ],
                    [
                        'text'  => 'a serious crime',
                        'emoji' => '🚨',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/a-serious-crime.mp3'),
                    ],
                    [
                        'text'  => 'punish',
                        'emoji' => '⚖️',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/punish.mp3'),
                    ],
                    [
                        'text'  => 'death',
                        'emoji' => '⏳',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/death.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])