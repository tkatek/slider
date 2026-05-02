<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Communication problems',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-slate-500 to-gray-600',
            'table_variant' => 'simple',
            'table_size' => 'xlarge',
            'mobile_cards' => true,
            'table_headers' => [''],
            'table_rows' => [
                [
                    [
                        'text' => 'Sorry, Can you say that again?',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/1.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'What! I didn&rsquo;t catch that!',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/2.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'Sorry, I lost you. Can you repeat that again?',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/3.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'I can&rsquo;t hear you very well.',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/4.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'You&rsquo;re breaking up!',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/5.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'Let me turn up the volume.',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/6.mp3'),
                    ],
                ],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-slate-500 to-gray-600',
            'table_variant' => 'simple',
            'table_size' => 'xlarge',
            'mobile_cards' => true,
            'table_headers' => [''],
            'table_rows' => [
                [
                    [
                        'text' => 'Can you hear me?',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/7.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'What about now?',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/8.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'There&rsquo;s an echo now.',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/9.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'The connection is too slow.',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/10.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'Are you still there?',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/11.mp3'),
                    ],
                ],
                [
                    [
                        'text' => 'We can try again.',
                        'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/12.mp3'),
                    ],
                ],

            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])