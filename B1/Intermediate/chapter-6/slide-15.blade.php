<?php

$content = [
    'title'    => 'Practice 8',
    'subtitle' => '',

    'instruction'      => 'Correct the mistakes',
    'instruction_note' => '',

    'grid_class' => 'grid-cols-1',

    'card_class' => '[&_.lp-input]:!w-full [&_.lp-input]:!min-w-0 [&_.lp-input]:!max-w-full',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'Advertisements '],
                ['html' => '<span class="font-black text-red-500">sees</span>'],
                ['text' => ' on buses, billboards, and websites.'],
            ],
        ],
        [
            'speaker' => '->',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Advertisements are seen on buses, billboards, and websites',
                    'placeholder' => 'Advertisements...',
                    'answers' => [
                        'Advertisements are seen on buses, billboards, and websites',
                        'Advertisements are seen on buses, billboards, and websites.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'Companies '],
                ['html' => '<span class="font-black text-red-500">is advertise</span>'],
                ['text' => ' through social media and influencers.'],
            ],
        ],
        [
            'speaker' => '->',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Companies advertise through social media and influencers',
                    'placeholder' => 'Companies...',
                    'answers' => [
                        'Companies advertise through social media and influencers',
                        'Companies advertise through social media and influencers.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'Emotional appeal '],
                ['html' => '<span class="font-black text-red-500">is use</span>'],
                ['text' => ' by advertisers to connect products with feelings.'],
            ],
        ],
        [
            'speaker' => '->',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Emotional appeal is used by advertisers to connect products with feelings',
                    'placeholder' => 'Emotional appeal...',
                    'answers' => [
                        'Emotional appeal is used by advertisers to connect products with feelings',
                        'Emotional appeal is used by advertisers to connect products with feelings.',
                    ],
                ],
            ],
        ],

        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'Famous people '],
                ['html' => '<span class="font-black text-red-500">promotes</span>'],
                ['text' => ' products in celebrity endorsement campaigns.'],
            ],
        ],
        [
            'speaker' => '->',
            'parts' => [
                [
                    'blank' => true,
                    'answer' => 'Famous people promote products in celebrity endorsement campaigns',
                    'placeholder' => 'Famous people...',
                    'answers' => [
                        'Famous people promote products in celebrity endorsement campaigns',
                        'Famous people promote products in celebrity endorsement campaigns.',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])
