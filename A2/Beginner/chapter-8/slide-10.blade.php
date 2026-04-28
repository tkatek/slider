<?php
$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => "Have / Has",
    'theme_class' => 'grammar-theme-modern',
    'header_wrap_class' => 'mb-5 text-center flex flex-col items-center gap-[0.55rem]',
    'title_class' => 'font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200',
    'center_shell' => true,

    'cards' => [
        [
            'icon' => '🧑',
            'title' => "Use HAVE/HAS",
            'badge_class' => 'badge-positive',
            'intro' => 'Use HAVE/HAS to describe physical features:',
            'bullets' => [
                'She has long hair.',
                'He has blue eyes.',
                'They have brown hair.',
                'I have green eyes.',
            ],
        ],
        [
            'icon' => '📘',
            'title' => "Remember the rule",
            'badge_class' => 'badge-negative',
            'intro' => "Remember the rule:",
            'bullets' => [
                'I / You / We / They + HAVE',
                'He / She / It + HAS',
            ],
        ],
        [
            'icon' => '✍️',
            'title' => "Practice",
            'structure_label' => 'Practice:',
            'highlight_class' => 'text-rose-500',
            'examples' => [
                ['subject' => 'My friend ', 'highlight' => 'has', 'rest' => ' curly hair and brown eyes.'],
            ],
        ],
    ],
];
?>

@include('slider.other.grammar-simple', ['content' => $content])