<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => '',
    'theme_class' => 'grammar-theme-modern',
    'header_wrap_class' => 'mb-5 text-center flex flex-col items-center gap-[0.55rem]',
    'title_class' => 'font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200',
    'center_shell' => true,
    'use_card_wrapper' => false,
    'cards_grid_class' => 'cards-grid slide-14-cards stack-on-tablet grid gap-2 lg:gap-2',
    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => 'Question Form with “Do”',
                    'items' => [
                        '<span class="hl-gold">Do</span> + subject + base verb?',
                        '<span class="hl-gold">Do</span> <span class="hl-red">you</span> take credit cards?',
                        '<span class="hl-gold">Do</span> <span class="hl-red">you</span> accept cash?',
                    ],
                ],
                [
                    'heading' => 'Negative Form',
                    'items' => [
                        '<span class="hl-gold">Do not</span> + base verb',
                        'I <span class="hl-red">don’t take</span> cheques.',
                        '<span class="hl-gold">He</span> <span class="hl-red">doesn’t take</span> cards.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'badge_class' => 'badge-positive',
            'intro' => '',
            'table_variant' => 'rich',
            'table_headers' => ['Pronoun', 'Question Form', 'Example'],
            'table_rows' => [
                ['I', 'Do I…?', 'Do I need a taxi?'],
                ['You', 'Do you…?', 'Do you take cards?'],
                ['We', 'Do we…?', 'Do we pay now?'],
                ['They', 'Do they…?', 'Do they live here?'],
                ['He', 'Does he…?', 'Does he drive fast?'],
                ['She', 'Does she…?', 'Does she work here?'],
                ['It', 'Does it…?', 'Does it cost $10?'],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'badge_class' => '',
            'intro' => '',
            'table_variant' => 'rich',
            'table_headers' => ['Subject', 'Negative Form', 'Example'],
            'table_rows' => [
                ['I', 'do not (don’t)', 'I don’t take cheques.'],
                ['You', 'do not (don’t)', 'You don’t need to worry.'],
                ['We', 'do not (don’t)', 'We don’t accept cards.'],
                ['They', 'do not (don’t)', 'They don’t stop here.'],
                ['He', 'does not (doesn’t)', 'He doesn’t take cheques.'],
                ['She', 'does not (doesn’t)', 'She doesn’t drive fast.'],
                ['It', 'does not (doesn’t)', 'It doesn’t cost much.'],
            ],
        ],

    ],
];
?>

@include("slider.other.grammar-cards", ['content' => $content])
