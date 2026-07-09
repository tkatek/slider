@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'image_text_style' => 'overlay',

        'groups' => [
            [
                'key'        => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',
                'items'      => [
                    [
                        'text'     => 'climate change',
                        'subtitle' => 'A long-term shift in global weather patterns.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/climate-change.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/climate-change.webp'),
                    ],
                    [
                        'text'     => 'fossil fuels',
                        'subtitle' => 'Natural fuels such as coal, oil, and natural gas that release energy when burned.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/fossil-fuels.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/fossil-fuels.webp'),
                    ],
                    [
                        'text'     => 'greenhouse gases',
                        'subtitle' => 'Gases in the atmosphere that trap heat and cause the Earth to warm.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/greenhouse-gases.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/greenhouse-gases.webp'),
                    ],
                    [
                        'text'     => 'trap heat',
                        'subtitle' => 'To catch or keep heat inside the atmosphere, making the Earth warmer.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/trap-heat.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/trap-heat.webp'),
                    ],
                    [
                        'text'     => 'impact',
                        'subtitle' => 'A strong effect or influence on people, nature, or the environment.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/impact.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/impact.webp'),
                    ],
                    [
                        'text'     => 'severe',
                        'subtitle' => 'Very bad or serious.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/severe.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/severe.webp'),
                    ],
                    [
                        'text'     => 'rising sea levels',
                        'subtitle' => 'The increase in the height of the ocean over time.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/rising-sea-levels.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/rising-sea-levels.webp'),
                    ],
                    [
                        'text'     => 'extinction',
                        'subtitle' => 'The complete disappearance of a species.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/extinction.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/extinction.webp'),
                    ],
                    [
                        'text'     => 'mitigate',
                        'subtitle' => 'To make a problem or its effects less severe or serious.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/mitigate.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/mitigate.webp'),
                    ],
                    [
                        'text'     => 'renewable energy',
                        'subtitle' => 'Energy from natural sources that can be replaced and will not run out.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/renewable-energy.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/renewable-energy.webp'),
                    ],
                ],
            ],
            [
                'key'        => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4',
                'items'      => [
                    [
                        'text'     => 'hurricane',
                        'subtitle' => 'A large and powerful storm with strong winds and heavy rain that forms over warm ocean waters.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/hurricane.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/hurricane.webp'),
                    ],
                    [
                        'text'     => 'floods',
                        'subtitle' => 'An overflow of water onto land that is usually dry, caused by heavy rain, storms, or rising rivers and seas.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/floods.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/floods.webp'),
                    ],
                    [
                        'text'     => 'droughts',
                        'subtitle' => 'A long period of time with very little or no rain, causing water shortages and dry conditions.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-4/audios/slide6/droughts.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-4/img/slide6/droughts.webp'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])