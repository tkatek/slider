<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Going To (Future Plans)',
    'theme_class' => 'grammar-theme-modern',
    'header_wrap_class' => 'mb-5 text-center flex flex-col items-center gap-[0.55rem]',
    'title_class' => 'font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200',

    'uses_title' => 'We use “going to” to talk about:',
    'uses' => [
        'Plans: I am going to travel.',
        'Things we decided before now: They are going to stay in a hotel.',
    ],

    'structure_title' => 'Structure:',
    'structure_rule'  => 'Subject + am/is/are + going to + verb',

    'question_title' => 'Question Form',
    'question_rule'  => 'Am/Is/Are + subject + going to + verb?',
    'question_examples' => [
        'Are you going to travel?',
        'Is she going to stay here?',
    ],

    'negative_title' => 'Negative Form',
    'negative_rule'  => 'Subject + am/is/are + not + going to + verb',
    'negative_examples' => [
        'I am not going to work.',
        'She isn’t going to travel.',
    ],
];
?>

@include("slider.other.grammar-simple", ['content' => $content])
