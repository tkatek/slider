<?php

$content = [
    'page_title' => 'Grammar',
    'title'      => 'Accepting and Refusing Polite Requests',
    'subtitle'   => '',

    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-teal-500 via-emerald-500 to-green-600',
            'table_variant' => 'simple',
            'table_size' => 'large',
            'mobile_cards' => true,
            'table_headers' => [
                'Request',
                'Accepting',
                'Refusing',
            ],
            'table_rows' => [
                [
                    'Could you help me move?',
                    'Sure!',
                    'Sorry, I can’t.',
                ],
                [
                    'Would you mind feeding my cat?',
                    'Not at all!',
                    'I’m afraid I can’t.',
                ],
                [
                    'Could you please water the plants?',
                    'Of course!',
                    'Sorry, I’m busy this weekend.',
                ],
                [
                    'Would you be able to drive me home?',
                    'No problem!',
                    'Unfortunately, I can’t.',
                ],
                [
                    'Could you lend me your laptop?',
                    'Certainly!',
                    'Sorry, I need it today.',
                ],
            ],
        ],
    ],
];

?>

@include("slider.other.grammar-info-cards", ['content' => $content])