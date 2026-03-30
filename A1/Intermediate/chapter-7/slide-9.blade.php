<?php
$content = [
    'page_title' => 'Speaking',
    'title'      => 'Speaking',
    'subtitle'   => 'What about you?',
    'header_wrap_class' => 'header-spacing text-center flex flex-col items-center gap-[0.55rem] my-8 mx-auto max-w-4xl',
    'title_class' => 'hero-title fade-up w-full tracking-[-0.04em] text-4xl md:text-5xl lg:text-6xl leading-[1.08] pb-[0.08em] font-black',
    'subtitle_class' => 'hero-subtitle fade-up fade-up-delay-1 max-w-2xl mx-auto text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100',

    'questions' => [
        [
            'label' => 'Question 1',
            'emoji' => '☀️',
            'text'  => 'Where are you going this summer?',
            'theme' => 'indigo',
        ],
        [
            'label' => 'Question 2',
            'emoji' => '🚗',
            'text'  => 'How will you travel?',
            'theme' => 'violet',
        ],
        [
            'label' => 'Answer 1',
            'emoji' => '🧳',
            'text'  => 'I’m going to ____.',
            'theme' => 'blue',
        ],
        [
            'label' => 'Answer 2',
            'emoji' => '🚌',
            'text'  => 'I will travel by ____.',
            'theme' => 'sky',
        ],
    ],
];
?>
@include("slider.other.speaking-discussion", ['content' => $content])
