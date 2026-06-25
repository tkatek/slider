@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'image_text_style' => 'overlay',

        'groups' => [
            [
                'key'        => 'with-images',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
                'items'      => [
                    [
                        'text'     => 'advertisement (advert)',
                        'subtitle' => 'A message that promotes a product or service.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/advertisement.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/advertisement.webp'),
                    ],
                    [
                        'text'     => 'billboard',
                        'subtitle' => 'A large outdoor sign used for advertising.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/billboard.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/billboard.webp'),
                    ],
                    [
                        'text'     => 'audience',
                        'subtitle' => 'The group of people who see or hear a message.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/audience.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/audience.webp'),
                    ],
                    [
                        'text'     => 'celebrity endorsement',
                        'subtitle' => 'When a famous person promotes a product.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/celebrity-endorsement.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/celebrity-endorsement.webp'),
                    ],
                    [
                        'text'     => 'consumer',
                        'subtitle' => 'A person who buys products or services.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/consumer.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/consumer.webp'),
                    ],

                    [
                        'text'     => 'repetition',
                        'subtitle' => 'Showing or saying something many times.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/repetition.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/repetition.webp'),
                    ],
                    [
                        'text'     => 'misleading',
                        'subtitle' => 'Giving a false or incorrect impression.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/misleading.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/misleading.webp'),
                    ],
                    [
                        'text'     => 'trustworthy',
                        'subtitle' => 'Reliable and deserving trust.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/trustworthy.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/trustworthy.webp'),
                    ],
                ],
            ],
            [
                'key'        => 'without-images',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
                'items'      => [
                    [
                        'text'     => 'influence',
                        'subtitle' => "To affect someone's decisions or behavior.",
                        'emoji'    => '🧭',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/influence.mp3'),
                    ],
                    [
                        'text'     => 'persuade',
                        'subtitle' => 'To convince someone to do or believe something.',
                        'emoji'    => '💬',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/persuade.mp3'),
                    ],
                                        [
                        'text'     => 'emotional appeal',
                        'subtitle' => 'A technique that uses feelings to influence people.',
                        'emoji'    => '❤️',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/emotional-appeal.mp3'),

                    ],
                    [
                        'text'     => 'memorable',
                        'subtitle' => 'Easy to remember.',
                        'emoji'    => '⭐',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/memorable.mp3'),
                    ],
                    [
                        'text'     => 'ethical',
                        'subtitle' => 'Morally right and fair.',
                        'emoji'    => '⚖️',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/ethical.mp3'),
                    ],
                    [
                        'text'     => 'uninformed decision',
                        'subtitle' => 'A choice made without enough information.',
                        'emoji'    => '❔',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/uninformed-decision.mp3'),
                    ],
                    [
                        'text'     => 'transparent',
                        'subtitle' => 'Open and honest.',
                        'emoji'    => '🔎',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide7/transparent.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])