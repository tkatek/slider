<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Question Form with "Do"',
            'tone' => 'from-cyan-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">Do</span> + subject + base verb?',
                        '<span class="hl-gold">Do</span> <span class="hl-red">you</span> take credit cards?',
                        '<span class="hl-gold">Do</span> <span class="hl-red">you</span> accept cash?',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Negative Form',
            'tone' => 'from-blue-400 to-indigo-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">Do not</span> + base verb',
                        'I <span class="hl-red">don\'t take</span> cheques.',
                        '<span class="hl-gold">He</span> <span class="hl-red">doesn\'t take</span> cards.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => 'badge-positive',
            'intro' => '',
            'table_variant' => 'rich',
            'table_headers' => ['Pronoun', 'Question Form', 'Example'],
            'table_rows' => [
                ['I', 'Do I...?', 'Do I need a taxi?'],
                ['You', 'Do you...?', 'Do you take cards?'],
                ['We', 'Do we...?', 'Do we pay now?'],
                ['They', 'Do they...?', 'Do they live here?'],
                ['He', 'Does he...?', 'Does he drive fast?'],
                ['She', 'Does she...?', 'Does she work here?'],
                ['It', 'Does it...?', 'Does it cost $10?'],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-blue-300 to-violet-500',
            'badge_class' => '',
            'intro' => '',
            'table_variant' => 'rich',
            'table_headers' => ['Subject', 'Negative Form', 'Example'],
            'table_rows' => [
                ['I', 'do not (don\'t)', 'I don\'t take cheques.'],
                ['You', 'do not (don\'t)', 'You don\'t need to worry.'],
                ['We', 'do not (don\'t)', 'We don\'t accept cards.'],
                ['They', 'do not (don\'t)', 'They don\'t stop here.'],
                ['He', 'does not (doesn\'t)', 'He doesn\'t take cheques.'],
                ['She', 'does not (doesn\'t)', 'She doesn\'t drive fast.'],
                ['It', 'does not (doesn\'t)', 'It doesn\'t cost much.'],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
