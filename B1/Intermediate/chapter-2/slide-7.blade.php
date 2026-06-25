@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-1 sm:grid-cols-3',

        'items' => [
            [
                'text'     => 'worried (adjective)',
                'subtitle' => 'Feeling nervous or anxious about something.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-2/audios/slide7/worried.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide7/worried.webp'),
            ],
            [
                'text'     => 'upset (adjective)',
                'subtitle' => 'Unhappy, disappointed, or worried.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-2/audios/slide7/upset.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide7/upset.webp'),
            ],
            [
                'text'     => 'at the last minute (phrase)',
                'subtitle' => 'Just before something happens.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-2/audios/slide7/at-the-last-minute.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-2/img/slide7/at-the-last-minute.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])