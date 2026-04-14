<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Permissions , Obligation, & Prohibitions',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Permissions , Obligation, & Prohibitions',
            'tone' => 'from-sky-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'We use <span class="font-extrabold text-red-500 dark:text-red-400">can</span> to talk about things that are allowed, and <span class="font-extrabold text-red-500 dark:text-red-400">can&rsquo;t</span> or <span class="font-extrabold text-amber-500 dark:text-amber-400">mustn&rsquo;t</span> to talk about things that <span class="font-extrabold text-lime-500 dark:text-lime-400">are not allowed</span>. We also use <span class="font-extrabold text-sky-500 dark:text-sky-400">&ldquo;Must&rdquo;</span> for things we are obliged to do.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Grammar:',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
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
            'title' => 'Example',
            'tone' => 'from-cyan-400 to-blue-500',
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

@include("slider.other.grammar-info-cards", ['content' => $content])
