<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read the text & answer the questions.',
    'reading_title'   => '“Work faster and get more money?!”',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,
    'reading_allow_html' => true,

    'passage' => [
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">Many people think rewards motivate us. For example: <span class="font-black text-slate-900 dark:text-slate-50">“Work faster and get more money.”</span> But studies show rewards do not always help.</div>',
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">In one study, people solved a difficult problem. One group got money as a reward. The other group got no reward. Surprisingly, the group with rewards worked more slowly because they felt stressed.</div>',
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">Rewards work well for simple jobs, but not always for difficult or creative work. People often work better when they enjoy their work and have freedom.</div>',
    ],

    'questions' => [
        [
            'prompt'  => 'What do people use to motivate workers?',
            'correct' => 'Rewards',
            'options' => [
                'Rewards',
                'Holidays',
                'Games',
                'Music',
            ],
        ],
        [
            'prompt'  => 'What did people do in the study?',
            'correct' => 'Solved a problem',
            'options' => [
                'Played a game',
                'Solved a problem',
                'Watched TV',
                'Wrote a story',
            ],
        ],
        [
            'prompt'  => 'Which group worked more slowly?',
            'correct' => 'The group with rewards',
            'options' => [
                'The group with rewards',
                'The group without rewards',
                'Both groups',
                'The teachers',
            ],
        ],
        [
            'prompt'  => 'Why did the rewarded group work slowly?',
            'correct' => 'They felt stressed',
            'options' => [
                'They were bored',
                'They felt stressed',
                'They were tired',
                'They were hungry',
            ],
        ],
        [
            'prompt'  => 'What helps people work better?',
            'correct' => 'Freedom and enjoyment',
            'options' => [
                'Stress',
                'Punishment',
                'Freedom and enjoyment',
                'Noise',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
