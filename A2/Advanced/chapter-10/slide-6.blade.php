<?php

$content = [
    'title'    => 'Useful Language / Expressions',
    'subtitle' => '',

    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-stone-500 to-stone-800',
            'mobile_cards' => false,
            'card_class' => '[&_table]:table-fixed [&_th:nth-child(1)]:w-[45%] [&_th:nth-child(2)]:w-[45%] [&_th:nth-child(3)]:w-[10%] [&_td:nth-child(1)]:w-[45%] [&_td:nth-child(2)]:w-[45%] [&_td:nth-child(3)]:w-[10%] [&_td:nth-child(3)]:text-center [&_td:nth-child(3)>div]:justify-center',

            'table_headers' => [
                'Expression',
                'Function',
                '',
            ],

            'table_rows' => [
                [
                    'Can you keep it down?',
                    'asking someone to be quieter',
                    [
                        'text'  => '',
                        'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/can-you-keep-it-down.mp3'),
                    ],
                ],
                [
                    'I have to get up early.',
                    'explaining a problem',
                    [
                        'text'  => '',
                        'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/i-have-to-get-up-early.mp3'),
                    ],
                ],
                [
                    'I want to report a problem.',
                    'making a complaint',
                    [
                        'text'  => '',
                        'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/i-want-to-report-a-problem.mp3'),
                    ],
                ],
                [
                    'Can you be more specific?',
                    'asking for details',
                    [
                        'text'  => '',
                        'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/can-you-be-more-specific.mp3'),
                    ],
                ],
                [
                    'Our building policy doesn’t allow...',
                    'explaining rules',
                    [
                        'text'  => '',
                        'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/our-building-policy-doesnt-allow.mp3'),
                    ],
                ],
                [
                    'Don’t worry.',
                    'reassuring someone',
                    [
                        'text'  => '',
                        'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/dont-worry.mp3'),
                    ],
                ],
                [
                    'Your problem will be solved soon.',
                    'offering help',
                    [
                        'text'  => '',
                        'sound' => materialAsset('slider/A2/Advanced/chapter-10/audios/slide6/your-problem-will-be-solved-soon.mp3'),
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.other.grammar-info-cards', ['content' => $content])