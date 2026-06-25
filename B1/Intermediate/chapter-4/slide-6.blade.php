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
                        'text'     => 'brand (noun)',
                        'subtitle' => 'A name or symbol that represents a product or company.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/brand.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-4/img/slide6/brand.webp'),
                    ],
                    [
                        'text'     => 'advertising (noun)',
                        'subtitle' => 'Paid communication to promote products.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/advertising.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-4/img/slide6/advertising.webp'),
                    ],
                    [
                        'text'     => 'marketing (noun)',
                        'subtitle' => 'Activities used to promote and sell products.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/marketing.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-4/img/slide6/marketing.webp'),
                    ],
                    [
                        'text'     => 'quality (noun)',
                        'subtitle' => 'The standard or level of something.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/quality.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-4/img/slide6/quality.webp'),
                    ],
                    [
                        'text'     => 'ownership (noun)',
                        'subtitle' => 'The fact of owning something.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/ownership.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-4/img/slide6/ownership.webp'),
                    ],
                    [
                        'text'     => 'communicate (verb)',
                        'subtitle' => 'To share information or ideas.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/communicate.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-4/img/slide6/communicate.webp'),
                    ],
                    [
                        'text'     => 'experience (noun)',
                        'subtitle' => 'Something that happens or is lived through.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/experience.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-4/img/slide6/experience.webp'),
                    ],
                    [
                        'text'     => 'culture (noun)',
                        'subtitle' => 'Shared beliefs, values, and behaviors.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/culture.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-4/img/slide6/culture.webp'),
                    ],
                ],
            ],
            [
                'key'        => '',

                'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',
                'items'      => [
                    [
                        'text'     => 'guarantee (verb)',
                        'subtitle' => 'To promise something will be true or provided.',
                        'emoji'    => '✅',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/guarantee.mp3'),
                    ],
                    [
                        'text'     => 'trust (verb/noun)',
                        'subtitle' => 'To believe something is reliable.',
                        'emoji'    => '🤝',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/trust.mp3'),
                    ],
                    [
                        'text'     => 'belonging (noun)',
                        'subtitle' => 'Feeling accepted in a group.',
                        'emoji'    => '🫶',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/belonging.mp3'),
                    ],
                    [
                        'text'     => 'represent (verb)',
                        'subtitle' => 'To stand for or symbolize something.',
                        'emoji'    => '🔰',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/represent.mp3'),
                    ],
                    [
                        'text'     => 'influence (verb)',
                        'subtitle' => 'To affect decisions or behavior.',
                        'emoji'    => '🧭',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/influence.mp3'),
                    ],
                    [
                        'text'     => 'engage (verb)',
                        'subtitle' => 'To become involved with something or interact with it actively.',
                        'emoji'    => '🙋',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/engage.mp3'),
                    ],
                    [
                        'text'     => 'elements (noun)',
                        'subtitle' => 'Important parts or features that make up something.',
                        'emoji'    => '🧩',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/elements.mp3'),
                    ],
                    [
                        'text'     => 'passion (noun)',
                        'subtitle' => 'A strong feeling of enthusiasm or excitement for something.',
                        'emoji'    => '🔥',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/passion.mp3'),
                    ],
                    [
                        'text'     => 'choices (noun)',
                        'subtitle' => 'The options or decisions that a person can make.',
                        'emoji'    => '☑️',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide6/choices.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])