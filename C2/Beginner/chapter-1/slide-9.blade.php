<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading',
    'title'           => 'Reading',
    'subtitle'        => 'Read and answer these questions.',
    'reading_title'   => 'Advanced Communication',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,
    'reading_allow_html' => true,

    'passage' => [
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">At advanced levels of communication, speaking fluently is no longer enough. What truly matters is the ability to express ideas clearly, respond thoughtfully, and adjust your language depending on the situation.</div>',
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">Advanced speakers often avoid absolute statements. Instead, they acknowledge complexity by saying things like <span class="font-black text-slate-900 dark:text-slate-50">to some extent</span> or <span class="font-black text-slate-900 dark:text-slate-50">it depends on the context</span>. This flexibility allows them to communicate more persuasively and professionally.</div>',
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">Developing this skill requires reflection, active listening, and the confidence to express incomplete or evolving ideas.</div>',
    ],

    'questions' => [
        [
            'prompt'  => 'What does the speaker say is not enough at advanced levels?',
            'correct' => 'Speaking fluently',
            'options' => [
                'Speaking fluently',
                'Using complex grammar constantly',
                'Having a native-like accent',
                'Avoiding hesitation completely',
            ],
        ],
        [
            'prompt'  => 'Why do advanced speakers avoid absolute statements?',
            'correct' => 'Because they acknowledge complexity and adapt to context.',
            'options' => [
                'Because they acknowledge complexity and adapt to context.',
                'Because absolute statements are always grammatically incorrect.',
                'Because they want to sound less confident.',
                'Because professional communication avoids clear opinions.',
            ],
        ],
        [
            'prompt'  => 'Which phrase shows flexibility?',
            'correct' => 'It depends on the context.',
            'options' => [
                'It depends on the context.',
                'That is always true.',
                'There is no other explanation.',
                'Everyone agrees with this.',
            ],
        ],
        [
            'prompt'  => 'What helps develop advanced communication?',
            'correct' => 'Reflection, active listening, and confidence with evolving ideas',
            'options' => [
                'Reflection, active listening, and confidence with evolving ideas',
                'Speaking faster and using longer words',
                'Memorising fixed answers for every situation',
                'Avoiding uncertain or incomplete ideas',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
