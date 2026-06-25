@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',

        'groups' => [
            [
                'title' => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-3',
                'items' => [
                    [
                        'text'     => 'influence',
                        'subtitle' => 'to affect something',
                        'example'  => 'Birth order can influence behavior.',
                        'emoji'    => '🧭',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/influence.mp3'),
                    ],
                    [
                        'text'     => 'expectations',
                        'subtitle' => 'what people think you should do',
                        'example'  => 'Parents have high expectations.',
                        'emoji'    => '🎯',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/expectations.mp3'),
                    ],
                    [
                        'text'     => 'notice (be noticed)',
                        'subtitle' => 'to be seen or given attention',
                        'example'  => 'Middle children may feel less noticed.',
                        'emoji'    => '👀',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/notice-be-noticed.mp3'),
                    ],
                    [
                        'text'     => 'flexible',
                        'subtitle' => 'able to change easily',
                        'example'  => 'They are flexible in different situations.',
                        'emoji'    => '🤸',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/flexible.mp3'),
                    ],
                    [
                        'text'     => 'focus on',
                        'subtitle' => 'give attention to',
                        'example'  => 'They focus on their goals.',
                        'emoji'    => '🔎',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/focus-on.mp3'),
                    ],
                    [
                        'text'     => 'identity',
                        'subtitle' => 'who a person is',
                        'example'  => 'Twins may struggle with identity.',
                        'emoji'    => '🪪',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/identity.mp3'),
                    ],
                ],
            ],

            [
                'title' => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 xl:grid-cols-5',
                'items' => [
                    [
                        'text'     => 'birth order',
                        'subtitle' => 'the order you are born in your family',
                        'example'  => 'Birth order may affect personality.',
                        'emoji'    => '👨‍👩‍👧‍👦',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/birth-order.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/birth-order.webp'),
                    ],
                    [
                        'text'     => 'responsible',
                        'subtitle' => 'careful and doing duties well',
                        'example'  => 'Firstborns are often responsible.',
                        'emoji'    => '✅',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/responsible.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/responsible.webp'),
                    ],
                    [
                        'text'     => 'organized',
                        'subtitle' => 'good at planning things',
                        'example'  => 'They are very organized students.',
                        'emoji'    => '🗂️',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/organized.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/organized.webp'),
                    ],
                    [
                        'text'     => 'pressure',
                        'subtitle' => 'feeling of stress or expectation',
                        'example'  => 'Firstborns feel more pressure.',
                        'emoji'    => '😣',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/pressure.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/pressure.webp'),
                    ],
                    [
                        'text'     => 'creative',
                        'subtitle' => 'able to produce new ideas',
                        'example'  => 'Middle children are often creative.',
                        'emoji'    => '💡',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/creative.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/creative.webp'),
                    ],
                    [
                        'text'     => 'depend on',
                        'subtitle' => 'need someone for help',
                        'example'  => 'Youngest children may depend on others.',
                        'emoji'    => '🤲',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/depend-on.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/depend-on.webp'),
                    ],
                    [
                        'text'     => 'independent',
                        'subtitle' => 'able to do things alone',
                        'example'  => 'Only children are independent.',
                        'emoji'    => '🧍',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/independent.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/independent.webp'),
                    ],
                    [
                        'text'     => 'bond',
                        'subtitle' => 'close relationship',
                        'example'  => 'Twins have a strong bond.',
                        'emoji'    => '🔗',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/bond.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/bond.webp'),
                    ],
                    [
                        'text'     => 'mature',
                        'subtitle' => 'become more adult-like',
                        'example'  => 'Gap children mature quickly.',
                        'emoji'    => '🌱',
                        'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide9/mature.mp3'),
                        'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide9/mature.webp'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])