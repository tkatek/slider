@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',

        'items' => [
            [
                'text'     => 'traffic jam',
                'subtitle' => 'A situation where many vehicles cannot move because the road is crowded.',
                'example'  => 'Example: We were late because of a traffic jam.',
                'emoji'    => '🚗',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-7/audios/slide6/traffic-jam.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide6/traffic-jam.webp'),
            ],
            [
                'text'     => 'route',
                'subtitle' => 'The way or road used to get from one place to another.',
                'example'  => 'Example: I took a different route to work today.',
                'emoji'    => '🛣️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-7/audios/slide6/route.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide6/route.webp'),
            ],
            [
                'text'     => 'stuck',
                'subtitle' => 'Unable to move or leave a place or situation.',
                'example'  => 'Example: The bus was stuck in traffic for an hour.',
                'emoji'    => '🚍',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-7/audios/slide6/stuck.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide6/stuck.webp'),
            ],
            [
                'text'     => 'homeless',
                'subtitle' => 'Having no home or permanent place to live.',
                'example'  => 'Example: The city provides shelters for homeless people.',
                'emoji'    => '🏚️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-7/audios/slide6/homeless.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide6/homeless.webp'),
            ],
            [
                'text'     => 'mow the lawn',
                'subtitle' => 'To cut the grass in a garden or yard using a lawn mower.',
                'example'  => 'Example: My father mows the lawn every Saturday.',
                'emoji'    => '🌱',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-7/audios/slide6/mow-the-lawn.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-7/img/slide6/mow-the-lawn.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])