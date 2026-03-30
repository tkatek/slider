<?php
$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => "Should / Shouldn't",
    'theme_class' => 'grammar-theme-modern',
    'header_wrap_class' => 'mb-5 text-center flex flex-col items-center gap-[0.55rem]',
    'title_class' => 'font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200',
    'center_shell' => true,

    'cards' => [
        [
            'icon' => '✅',
            'title' => "What is 'should'?",
            'badge_class' => 'badge-positive',
            'intro' => 'We use should to:',
            'bullets' => [
                'Give advice',
                'Say something is a good idea',
                'Recommend something',
            ],
            'structure_label' => 'Structure:',
            'structure_rule' => 'Subject + should + base verb',
            'highlight_class' => 'text-rose-500',
            'examples' => [
                ['subject' => 'You ', 'highlight' => 'should', 'rest' => ' pack early.'],
                ['subject' => 'She ', 'highlight' => 'should', 'rest' => ' check her passport.'],
                ['subject' => 'We ', 'highlight' => 'should', 'rest' => ' buy travel insurance.'],
            ],
        ],
        [
            'icon' => '❌',
            'title' => "What is 'shouldn’t'?",
            'badge_class' => 'badge-negative',
            'intro_top' => "Shouldn’t = should not",
            'intro' => "We use shouldn’t to:",
            'bullets' => [
                'Give negative advice',
                'Say something is not a good idea',
            ],
            'structure_label' => 'Structure:',
            'structure_rule' => "Subject + shouldn’t + base verb",
            'highlight_class' => 'text-rose-500',
            'examples' => [
                ['subject' => 'You ', 'highlight' => "shouldn’t", 'rest' => ' overpack.'],
                ['subject' => 'He ', 'highlight' => "shouldn’t", 'rest' => ' wait until the last minute.'],
                ['subject' => 'They ', 'highlight' => "shouldn’t", 'rest' => ' go to the airport late.'],
            ],
        ],
    ],
];
?>

@include('slider.other.grammar-simple', ['content' => $content])
