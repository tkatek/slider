<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read and answer these questions.',
    'reading_title'   => 'Life experiences',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,
    'reading_allow_html' => true,

    'passage' => [
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]"><span class="font-black text-cyan-600 dark:text-cyan-300">Emma:</span> I have visited lots of countries in my life. I have been to Italy, Spain, and Greece. Last summer, I went to Rome with my sister. We visited the Colosseum and ate delicious pasta. I have never tried skydiving, but I would like to do it one day.</div>',

        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]"><span class="font-black text-cyan-600 dark:text-cyan-300">Tom:</span> I have had a few interesting jobs. I worked as a waiter when I was 18. Later, I have become a taxi driver. I have met many people in my job. Once, I drove a famous singer to the airport! I haven’t travelled much, but I have been to Paris once. It was a great trip.</div>',
    ],

    'questions' => [
        [
            'prompt'  => 'Emma has visited Europe.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
                'Not Given',
            ],
        ],
        [
            'prompt'  => 'Emma and her sister visited Paris last summer.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
                'Not Given',
            ],
        ],
        [
            'prompt'  => 'Tom worked as a taxi driver when he was 21.',
            'correct' => 'Not Given',
            'options' => [
                'True',
                'False',
                'Not Given',
            ],
        ],
        [
            'prompt'  => 'Tom has travelled to many countries.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
                'Not Given',
            ],
        ],
        [
            'prompt'  => 'Emma has...',
            'correct' => 'already eaten pasta.',
            'options' => [
                'never been to Italy.',
                'been to Italy twice.',
                'not visited Spain yet.',
                'already eaten pasta.',
            ],
        ],
        [
            'prompt'  => 'What job did Tom do first?',
            'correct' => 'Waiter',
            'options' => [
                'Musician',
                'Taxi driver',
                'Waiter',
                'Singer',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])