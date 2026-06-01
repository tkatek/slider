<?php

$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar: Asking for Favours Politely',
    'subtitle'   => 'This lesson teaches three common ways to ask for favors politely in English.',

    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-emerald-500 via-green-500 to-lime-500',
            'table_variant' => 'simple',
            'table_size' => 'large',
            'mobile_cards' => true,
            'table_headers' => [
                'Structure',
                'Form',
                'Use',
                'Example',
            ],
            'table_rows' => [
                [
                    'Would you be able to...?',
                    'Would you be able to + base verb',
                    'to ask politely if someone can do something',
                    'Would you be able to help me move?',
                ],
                [
                    'Would you mind...?',
                    'Would you mind + verb-ing',
                    'to make very polite requests',
                    'Would you mind feeding my cat?',
                ],
                [
                    'Could you please...?',
                    'Could you please + base verb',
                    'to ask politely for help or a favor',
                    'Could you please water my plants?',
                ],
            ],
        ],
    ],
];

?>

@include("slider.other.grammar-info-cards", ['content' => $content])