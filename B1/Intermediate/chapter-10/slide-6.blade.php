@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',

        'groups' => [
            [
                'key'        => 'with-images',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',
                'items'      => [
                    [
                        'text'     => 'shy',
                        'subtitle' => 'quiet and nervous around people',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/shy.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/shy.webp'),
                    ],
                    [
                        'text'     => 'introverted',
                        'subtitle' => 'preferring to be alone',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/introverted.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/introverted.webp'),
                    ],
                    [
                        'text'     => 'fascination',
                        'subtitle' => 'strong interest',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/fascination.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/fascination.webp'),
                    ],
                    [
                        'text'     => 'heroic',
                        'subtitle' => 'very brave and admirable',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/heroic.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/heroic.webp'),
                    ],
                    [
                        'text'     => 'daydream',
                        'subtitle' => 'to think pleasant thoughts',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/daydream.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/daydream.webp'),
                    ],
                    [
                        'text'     => 'bully',
                        'subtitle' => 'to hurt or frighten someone',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/bully.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/bully.webp'),
                    ],
                    [
                        'text'     => 'guilty',
                        'subtitle' => 'feeling bad about something',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/guilty.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/guilty.webp'),
                    ],
                    [
                        'text'     => 'ashamed',
                        'subtitle' => 'feeling embarrassed',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/ashamed.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/ashamed.webp'),
                    ],
                    [
                        'text'     => 'determination',
                        'subtitle' => 'not giving up',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/determination.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/determination.webp'),
                    ],
                    [
                        'text'     => 'lend a hand',
                        'subtitle' => 'to help someone',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/lend-a-hand.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide6/lend-a-hand.webp'),
                    ],
                ],
            ],
            [
                'key'        => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6',
                'items'      => [
                    [
                        'text'     => 'courage',
                        'subtitle' => 'the strength to do something difficult',
                        'emoji'    => '💪',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/courage.mp3'),
                    ],
                    [
                        'text'     => 'bravery',
                        'subtitle' => 'showing courage',
                        'emoji'    => '🛡️',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/bravery.mp3'),
                    ],
                    [
                        'text'     => 'hesitate',
                        'subtitle' => 'to pause before acting',
                        'emoji'    => '🤔',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/hesitate.mp3'),
                    ],
                    [
                        'text'     => 'potential',
                        'subtitle' => 'having the ability to do something great',
                        'emoji'    => '🌟',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/potential.mp3'),
                    ],
                    [
                        'text'     => 'unnoticed',
                        'subtitle' => 'not seen or recognized',
                        'emoji'    => '👀',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/unnoticed.mp3'),
                    ],
                    [
                        'text'     => 'unrecognized',
                        'subtitle' => 'not appreciated',
                        'emoji'    => '🏅',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide6/unrecognized.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])