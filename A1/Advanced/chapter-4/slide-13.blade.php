<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Present Simple with "Do" (Action Verbs)',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Structure',
            'tone' => 'from-sky-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">Subject + base verb</span>',
                        'I <span class="hl-gold">take</span> cards.',
                        'We <span class="hl-gold">go</span> now.',
                        'You <span class="hl-gold">catch</span> a train.',
                        '<span class="hl-gold">For he / she / it &rarr; add -s</span>',
                        'He <span class="hl-gold">takes</span> cards.',
                        'The driver <span class="hl-gold">drives</span> fast.',
                    ], 
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Examples from the Dialogue1:',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'I <span class="hl-gold">take</span> both cards and cash.',
                        'He <span class="hl-gold">takes</span> both cards and cash.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-blue-300 to-violet-500',
            'badge_class' => '',
            'intro' => '',
            'table_variant' => 'simple',
            'table_headers' => ['Pronoun', 'Form', 'Example'],
            'table_rows' => [
                ['I', '(take)', 'I take card and cash..'],
                ['You', '(take)', 'you take card and cash..'],
                ['We', '(take)', 'We take card and cash..'],
                ['They', '(take)', 'They take card and cash..'],
                ['He', '(takes)', 'He takes card and cash..'],
                ['She', '(takes)', 'She takes card and cash'],
                ['It', '(takes)', 'It takes.....'],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
