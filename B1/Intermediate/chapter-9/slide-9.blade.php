@php
    $content = [
        'title'      => 'New Language',
        'subtitle'   => '',

        'groups' => [
            [
                'key'        => 'with-images',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4',
                'items'      => [
                    [
                        'text'     => 'try new things',
                        'subtitle' => 'do activities you have not done before',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/try-new-things.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide9/try-new-things.webp'),
                    ],
                    [
                        'text'     => 'support someone in everything they do',
                        'subtitle' => 'encourage and help someone',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/support-someone-in-everything-they-do.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide9/support-someone-in-everything-they-do.webp'),
                    ],
                    [
                        'text'     => 'become interested in',
                        'subtitle' => 'start liking or wanting to learn about something',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/become-interested-in.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide9/become-interested-in.webp'),
                    ],
                    [
                        'text'     => 'solve problems',
                        'subtitle' => 'find solutions to challenges',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/solve-problems.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide9/solve-problems.webp'),
                    ],
                ],
            ],
            [
                'key'        => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6',
                'items'      => [
                    [
                        'text'     => 'learn valuable lessons',
                        'subtitle' => 'gain important knowledge from experiences',
                        'emoji'    => '📘',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/learn-valuable-lessons.mp3'),
                    ],
                    [
                        'text'     => 'become open-minded',
                        'subtitle' => 'be willing to accept different ideas',
                        'emoji'    => '🧠',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/become-open-minded.mp3'),
                    ],
                    [
                        'text'     => 'notice details',
                        'subtitle' => 'pay attention to small things',
                        'emoji'    => '🔎',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/notice-details.mp3'),
                    ],
                    [
                        'text'     => 'create useful things',
                        'subtitle' => 'make things that help people',
                        'emoji'    => '🛠️',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/create-useful-things.mp3'),
                    ],
                    [
                        'text'     => 'inspiration is everywhere',
                        'subtitle' => 'motivation can come from many sources',
                        'emoji'    => '✨',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/inspiration-is-everywhere.mp3'),
                    ],
                    [
                        'text'     => 'grow and improve',
                        'subtitle' => 'develop and become better',
                        'emoji'    => '🌱',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide9/grow-and-improve.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])