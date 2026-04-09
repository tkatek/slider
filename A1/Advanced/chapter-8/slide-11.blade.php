<?php
$content = [
    'page_title' => 'Quick Comparison Table',
    'title' => 'Quick Comparison Table',
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
            'type' => 'table',
            'title' => '',
            'badge_class' => 'badge-positive',
            'intro' => '',
            'table_variant' => 'simple',
            'table_size' => 'xlarge',
            'table_headers' => ['Countable Nouns', 'Uncountable Nouns'],
            'table_rows' => [
                ['many <span class="text-blue-500 font-black">restaurants</span>', 'much <span class="text-orange-500 font-black">traffic</span>'],
                ['a lot of <span class="text-blue-500 font-black">shops</span>', 'a lot of <span class="text-orange-500 font-black">noise</span>'],
                ['a few <span class="text-blue-500 font-black">parks</span>', 'a little <span class="text-orange-500 font-black">noise</span>'],
            ],
        ],
    ],
];
?>

@include('slider.other.grammar-cards', ['content' => $content])
