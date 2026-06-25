@php
    $content = [
        'title'      => 'New Language',
        'subtitle'   => '',
        'image_text_style' => 'overlay',

        'groups' => [
            [
                'key'        => 'with-images',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4',
                'items'      => [
                    [
                        'text'     => 'care for each other',
                        'subtitle' => 'look after and support each other',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/care-for-each-other.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide9/care-for-each-other.webp'),
                    ],
                    [
                        'text'     => 'count on someone',
                        'subtitle' => 'depend on someone',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/count-on-someone.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide9/count-on-someone.webp'),
                    ],
                    [
                        'text'     => "put yourself in someone's shoes",
                        'subtitle' => 'imagine how another person feels',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/put-yourself-in-someones-shoes.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide9/put-yourself-in-someones-shoes.webp'),
                    ],
                    [
                        'text'     => 'pay full attention',
                        'subtitle' => 'listen very carefully',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/pay-full-attention.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide9/pay-full-attention.webp'),
                    ],
                ],
            ],
            [
                'key'        => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6',
                'items'      => [
                    [
                        'text'     => 'be there for someone',
                        'subtitle' => 'support someone when needed',
                        'emoji'    => '🤝',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/be-there-for-someone.mp3'),
                    ],
                    [
                        'text'     => 'show kindness',
                        'subtitle' => 'act in a caring way',
                        'emoji'    => '💙',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/show-kindness.mp3'),
                    ],
                    [
                        'text'     => 'respect feelings',
                        'subtitle' => "consider other people's emotions",
                        'emoji'    => '🫶',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/respect-feelings.mp3'),
                    ],
                    [
                        'text'     => 'friendship needs care',
                        'subtitle' => 'friendships require effort',
                        'emoji'    => '🌱',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/friendship-needs-care.mp3'),
                    ],
                    [
                        'text'     => 'take part in',
                        'subtitle' => 'participate in',
                        'emoji'    => '🙋',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/take-part-in.mp3'),
                    ],
                    [
                        'text'     => 'make friendship stronger',
                        'subtitle' => 'improve a friendship',
                        'emoji'    => '💪',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide9/make-friendship-stronger.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])