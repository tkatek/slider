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
    'cards_grid_class' => 'grid gap-2 md:grid-cols-2 lg:grid-cols-2 lg:gap-2',
    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => 'Negative Form',
                    'items' => [
                        '<span class="hl-gold">am/is/are+not</span>',
                        'Traffic <span class="hl-gold">is not</span> bad.',
                        'It <span class="hl-gold">isn’t</span> expensive',
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
                    'heading' => 'Question Form',
                    'items' => [
                        '<span class="hl-gold">Be + subject?</span>',
                        '<span class="hl-gold">Is</span> traffic bad?',
                        '<span class="hl-gold">Is</span> it $15?',
                    ],
                ],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'badge_class' => '',
            'intro' => '',
            'card_class' => 'md:col-span-2 lg:col-span-2',
            'table_variant' => 'simple',
            'table_headers' => ['Subject', 'Verb “To Be”'],
            'table_rows' => [
                ['I', 'am'],
                ['You / We / They', 'are'],
                ['He / She / It', 'is'],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-cards", ['content' => $content])
