<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Present simple',
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
                    'heading' => 'Asking for Information:',
                    'items' => [
                        'Where <span class="hl-gold">does</span> this bus <span class="hl-gold">go</span>?',
                        'What time <span class="hl-gold">does</span> the bus <span class="hl-gold">leave</span>?',
                        '<span class="hl-gold">Does</span> the bus <span class="hl-gold">go</span> to the airport?',
                        '<span class="hl-gold">Do</span> buse<span class="hl-red">s</span> <span class="hl-gold">leave</span> at night?',
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
                    'heading' => 'Rule',
                    'items' => [
                        'Use <span class="hl-gold">do</span> for plural subjects and <span class="hl-gold">does</span> for singular subjects when asking questions in the present simple.',
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
                        'To ask questions in the present simple, we use: <span class="hl-gold">do</span> / <span class="hl-gold">does</span> + the subject + the verb.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-cards", ['content' => $content])
