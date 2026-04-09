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
    'play_label' => 'Play example',
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
            'table_headers' => ['Quantifier', 'Used With', 'Meaning', 'Example'],
            'table_rows' => [
                ['Many', 'Countable plural nouns', 'a large number', ['text' => '"There are <span class="text-red-500 font-black">many</span> <span class="text-slate-900 dark:text-slate-50 font-black">restaurants</span> in my neighbourhood."', 'speech' => 'There are many restaurants in my neighbourhood.']],
                ['Much', 'Uncountable nouns', 'a large amount', ['text' => '"There <span class="text-red-500 font-black">isn\'t much</span> <span class="text-slate-900 dark:text-slate-50 font-black">traffic</span> in my area."', 'speech' => 'There isn\'t much traffic in my area.']],
                ['A lot of', 'Countable + uncountable nouns', 'a large number/amount', ['text' => '"There are <span class="text-red-500 font-black">a lot of</span> <span class="text-slate-900 dark:text-slate-50 font-black">shops</span> here. / There is <span class="text-red-500 font-black">a lot of</span> <span class="text-slate-900 dark:text-slate-50 font-black">traffic</span>."', 'speech' => 'There are a lot of shops here. There is a lot of traffic.']],
                ['A few', 'Countable plural nouns', 'some, but not many', ['text' => '"There are a <span class="text-red-500 font-black">few</span> <span class="text-slate-900 dark:text-slate-50 font-black">parks</span> near my house."', 'speech' => 'There are a few parks near my house.']],
                ['A little', 'Uncountable nouns', 'some, but not much', ['text' => '"There is a <span class="text-red-500 font-black">little</span> <span class="text-slate-900 dark:text-slate-50 font-black">noise</span> at night."', 'speech' => 'There is a little noise at night.']],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-cards", ['content' => $content])
