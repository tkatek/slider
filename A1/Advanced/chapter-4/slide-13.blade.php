<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Present Simple with "Do" (Action Verbs)',
    'theme_class' => 'grammar-theme-modern',
    'header_wrap_class' => 'mb-5 text-center flex flex-col items-center gap-[0.55rem]',
    'title_class' => 'font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200',
    'center_shell' => true,
    'cards_grid_class' => 'grid gap-2 md:grid-cols-2 lg:grid-cols-3 lg:gap-2',
    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => 'Structure',
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
            'title' => '',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => 'Examples from the Dialogue1:',
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

@include("slider.other.grammar-cards", ['content' => $content])
