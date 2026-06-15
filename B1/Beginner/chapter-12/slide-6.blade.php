@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',

        'groups' => [
            [
                'title' => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
                'items' => [
                    [
                        'text'     => 'burrito',
                        'subtitle' => 'A Mexican food made with a tortilla wrapped around filling.',
                        'example'  => 'Jack ate a burrito before bed.',
                        'emoji'    => '🌯',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-12/audios/slide6/burrito.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide6/burrito.webp'),
                    ],
                    [
                        'text'     => 'spicy',
                        'subtitle' => 'Having a strong, hot flavor.',
                        'example'  => 'The burrito was spicy.',
                        'emoji'    => '🌶️',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-12/audios/slide6/spicy.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide6/spicy.webp'),
                    ],
                    [
                        'text'     => 'realized',
                        'subtitle' => 'Understood something clearly.',
                        'example'  => 'Jack realized he shouldn\'t have eaten it.',
                        'emoji'    => '💡',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-12/audios/slide6/realized.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide6/realized.webp'),
                    ],
                    [
                        'text'     => 'unusual',
                        'subtitle' => 'Different from normal.',
                        'example'  => 'The doctor asked if he had eaten anything unusual.',
                        'emoji'    => '❓',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-12/audios/slide6/unusual.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide6/unusual.webp'),
                    ],
                    [
                        'text'     => 'lesson',
                        'subtitle' => 'Something learned from an experience.',
                        'example'  => 'Jack learned his lesson.',
                        'emoji'    => '📘',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-12/audios/slide6/lesson.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide6/lesson.webp'),
                    ],
                    [
                        'text'     => 'sick',
                        'subtitle' => 'Not feeling well.',
                        'example'  => 'He woke up feeling sick.',
                        'emoji'    => '🤒',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-12/audios/slide6/sick.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide6/sick.webp'),
                    ],
                    [
                        'text'     => 'doctor',
                        'subtitle' => 'A person who treats illnesses.',
                        'example'  => 'Jack went to the doctor.',
                        'emoji'    => '👨‍⚕️',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-12/audios/slide6/doctor.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide6/doctor.webp'),
                    ],
                    [
                        'text'     => 'replied',
                        'subtitle' => 'Answered.',
                        'example'  => 'Jack replied that he ate a burrito.',
                        'emoji'    => '💬',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-12/audios/slide6/replied.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-12/img/slide6/replied.webp'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])