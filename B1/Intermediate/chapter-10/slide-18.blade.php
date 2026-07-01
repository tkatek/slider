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
                        'text'     => 'courage',
                        'subtitle' => 'being brave even when something is scary',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/courage.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/courage.webp'),
                    ],
                    [
                        'text'     => 'teamwork',
                        'subtitle' => 'people helping each other to reach a goal',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/teamwork.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/teamwork.webp'),
                    ],
                    [
                        'text'     => 'bystanders',
                        'subtitle' => 'people who are nearby and see what happens',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/bystanders.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/bystanders.webp'),
                    ],
                    [
                        'text'     => 'crowd',
                        'subtitle' => 'a large group of people',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/crowd.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/crowd.webp'),
                    ],
                    [
                        'text'     => 'scene',
                        'subtitle' => 'the place where something happens',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/scene.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/scene.webp'),
                    ],
                    [
                        'text'     => 'paramedics',
                        'subtitle' => 'medical helpers who give quick care in emergencies',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/paramedics.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/paramedics.webp'),
                    ],
                    [
                        'text'     => 'followed',
                        'subtitle' => 'did what someone said to do',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/followed.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/followed.webp'),
                    ],
                    [
                        'text'     => 'bravery',
                        'subtitle' => 'showing strength and calmness during danger',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/bravery.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/bravery.webp'),
                    ],
                    [
                        'text'     => 'absence',
                        'subtitle' => 'when something is not there',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/absence.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/absence.webp'),
                    ],
                    [
                        'text'     => 'remained',
                        'subtitle' => 'stayed the same',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide18/remained.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide18/remained.webp'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])