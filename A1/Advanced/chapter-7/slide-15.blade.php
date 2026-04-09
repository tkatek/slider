<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Permissions , Obligation, & Prohibitions',
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
                    'heading' => 'Permissions , Obligation, & Prohibitions',
                    'items' => [
                        'We use <span class="font-extrabold text-red-500 dark:text-red-400">can</span> to talk about things that are allowed, and <span class="font-extrabold text-red-500 dark:text-red-400">can&rsquo;t</span> or <span class="font-extrabold text-amber-500 dark:text-amber-400">mustn&rsquo;t</span> to talk about things that <span class="font-extrabold text-lime-500 dark:text-lime-400">are not allowed</span>. We also use <span class="font-extrabold text-sky-500 dark:text-sky-400">&ldquo;Must&rdquo;</span> for things we are obliged to do.',
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
                    'heading' => 'Grammar:',
                    'items' => [
                        '<span class="font-extrabold text-red-500 dark:text-red-400">Can</span>',
                        '<span class="font-extrabold text-red-500 dark:text-red-400">can&rsquo;t</span>',
                        '<span class="font-extrabold text-sky-500 dark:text-sky-400">must</span>',
                        '<span class="font-extrabold text-amber-500 dark:text-amber-400">mustn&rsquo;t</span>',
                        '+',
                        'The infinitive verb',
                        '<span class="font-extrabold text-slate-900 dark:text-slate-100">am</span>',
                        '<span class="font-extrabold text-slate-900 dark:text-slate-100">is</span>',
                        '<span class="font-extrabold text-slate-900 dark:text-slate-100">are</span>',
                        '+',
                        '<span class="font-extrabold text-lime-500 dark:text-lime-400">allowed</span>',
                        '<span class="font-extrabold text-sky-500 dark:text-sky-400">+ to +</span> infinitive',
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
                    'heading' => '',
                    'items' => [
                        'I <span class="font-extrabold text-red-500 dark:text-red-400">can cross</span> the road now.',
                        'I <span class="font-extrabold text-slate-900 dark:text-slate-100">am allowed</span> <span class="font-extrabold text-red-500 dark:text-red-400">to cross</span> the road now.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-cards", ['content' => $content])
