@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'image_text_style' => 'overlay',

        'groups' => [
            [
                'key'        => 'with-images',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4',
                'items'      => [
                    [
                        'text'     => 'friendship (noun)',
                        'subtitle' => 'a close relationship between friends',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/friendship.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide7/friendship.webp'),
                    ],
                    [
                        'text'     => 'bond (noun)',
                        'subtitle' => 'a strong connection between people',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/bond.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide7/bond.webp'),
                    ],
                    [
                        'text'     => 'empathy (noun)',
                        'subtitle' => "understanding another person's feelings",
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/empathy.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide7/empathy.webp'),
                    ],
                    [
                        'text'     => 'active listening (noun phrase)',
                        'subtitle' => 'listening carefully and giving full attention',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/active-listening.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide7/active-listening.webp'),
                    ],
                    [
                        'text'     => 'support (noun/verb)',
                        'subtitle' => 'help and encouragement',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/support.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide7/support.webp'),
                    ],
                    [
                        'text'     => 'kindness (noun)',
                        'subtitle' => 'being friendly and caring',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/kindness.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide7/kindness.webp'),
                    ],
                    [
                        'text'     => 'boundaries (noun)',
                        'subtitle' => 'limits that help people feel comfortable and respected',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/boundaries.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide7/boundaries.webp'),
                    ],
                    [
                        'text'     => 'gesture (noun)',
                        'subtitle' => 'an action that shows a feeling or intention',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/gesture.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide7/gesture.webp'),
                    ],
                ],
            ],
            [
                'key'        => '',
                'grid_class' => 'grid-cols-1 sm:grid-cols-3',
                'items'      => [
                    [
                        'text'     => 'respect (verb/noun)',
                        'subtitle' => 'treating others well and valuing them',
                        'emoji'    => '🤝',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/respect.mp3'),
                    ],
                    [
                        'text'     => 'trust (noun)',
                        'subtitle' => 'believing that someone is honest and reliable',
                        'emoji'    => '🔒',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/trust.mp3'),
                    ],
                    [
                        'text'     => 'nurture (verb)',
                        'subtitle' => 'help something grow and develop',
                        'emoji'    => '🌱',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide7/nurture.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])