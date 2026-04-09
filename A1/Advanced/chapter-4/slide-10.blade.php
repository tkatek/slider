<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Present simple: With verb to (be)',
    'theme_class' => 'grammar-theme-modern grammar-slide-10',
    'header_wrap_class' => 'mb-5 text-center flex flex-col items-center gap-[0.55rem]',
    'title_class' => 'font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500',
    'subtitle_class' => 'text-lg sm:text-xl lg:text-[1.4rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200',
    'center_shell' => true,
    'cards_grid_class' => 'grid gap-2 md:grid-cols-2 lg:grid-cols-2 lg:gap-2',
    'cards' => [
        [
            'type' => 'examples',
            'title' => '',
            'badge_class' => '',
            'intro' => 'We use <span class="hl-gold">am / is / are</span> to describe:',
            'example_marker' => 'bullet',
            'examples' => [
                ['subject' => '', 'highlight' => 'Situations', 'rest' => ''],
                ['subject' => '', 'highlight' => 'Conditions', 'rest' => ''],
                ['subject' => '', 'highlight' => 'Prices', 'rest' => ''],
                ['subject' => '', 'highlight' => 'Facts', 'rest' => ''],
            ],
            'highlight_class' => '',
        ],
        [
            'type' => 'examples',
            'title' => '',
            'badge_class' => '',
            'intro' => '',
            'example_marker' => 'bullet',
            'examples' => [
                ['subject' => '', 'highlight' => 'Traffic <span class="hl-gold">is not</span> bad right now.', 'rest' => ''],
                ['subject' => '', 'highlight' => 'It <span class="hl-gold">is</span> 14.25.', 'rest' => ''],
                ['subject' => '', 'highlight' => 'It <span class="hl-gold">is</span> usually around $15.', 'rest' => ''],
                ['subject' => '', 'highlight' => 'We <span class="hl-gold">are</span> here.', 'rest' => ''],
            ],
            'highlight_class' => '',
        ],
    ],
];
?>

@include("slider.other.grammar-cards", ['content' => $content])
