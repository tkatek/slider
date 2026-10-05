{{-- Canva source page 3: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Warm-Up — From Inventions to Solutions',
        'subtitle' => 'Match each invention with the problem or need it has helped to address.',
        'activity_title' => 'Match each invention with the problem or need it has helped to address.',
        'shuffle_right' => true,
        'pairs' => [
            [
                'id' => '1',
                'left' => [
                    'type' => 'word',
                    'text' => 'The smartphone',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'People needed to communicate, access information and stay connected while on the move.',
                ],
            ],
            [
                'id' => '2',
                'left' => [
                    'type' => 'word',
                    'text' => 'The internet',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'People needed to share and access information across long distances.',
                ],
            ],
            [
                'id' => '3',
                'left' => [
                    'type' => 'word',
                    'text' => 'The refrigerator',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'People needed to keep food fresh for longer and reduce spoilage.',
                ],
            ],
            [
                'id' => '4',
                'left' => [
                    'type' => 'word',
                    'text' => 'The light bulb',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'People needed a practical source of artificial light after dark.',
                ],
            ],
            [
                'id' => '5',
                'left' => [
                    'type' => 'word',
                    'text' => 'The printing press',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'People needed to produce and distribute written information more efficiently.',
                ],
            ],
            [
                'id' => '6',
                'left' => [
                    'type' => 'word',
                    'text' => 'The electric car',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'People needed cleaner alternatives to traditional petrol- and diesel-powered transport.',
                ],
            ],
            [
                'id' => '7',
                'left' => [
                    'type' => 'word',
                    'text' => 'Automation',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'Industries needed to increase productivity and produce goods more efficiently.',
                ],
            ],
            [
                'id' => '8',
                'left' => [
                    'type' => 'word',
                    'text' => 'The aeroplane',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'People needed a faster way to travel long distances.',
                ],
            ],
        ],
        'page_title' => 'Warm-Up — From Inventions to Solutions',
    ];
@endphp

@include('slider.game.matching-pairs', ['content' => $content])
