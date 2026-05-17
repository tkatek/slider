@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => 'Ancient Egyptian Cats',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4',

        'items' => [
            [
                'text'  => 'catch',
                'emoji' => '🫴',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/catch.mp3'),
            ],
            [
                'text'  => 'sacred',
                'emoji' => '✨',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/sacred.mp3'),
            ],
            [
                'text'  => 'goddess',
                'emoji' => '👑',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/goddess.mp3'),
            ],
            [
                'text'  => 'jewellery',
                'emoji' => '💍',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/jewellery.mp3'),
            ],
            [
                'text'  => 'fertility',
                'emoji' => '🌱',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/fertility.mp3'),
            ],
            [
                'text'  => 'joy',
                'emoji' => '😊',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/joy.mp3'),
            ],
            [
                'text'  => 'mummify',
                'emoji' => '🏺',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/mummify.mp3'),
            ],
            [
                'text'  => 'ornament',
                'emoji' => '🪬',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/ornament.mp3'),
            ],
            [
                'text'  => 'fortune',
                'emoji' => '🍀',
                'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide18/fortune.mp3'),
            ],
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
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])
