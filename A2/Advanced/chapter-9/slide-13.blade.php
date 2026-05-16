<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Answer the following questions about the interview',
    'reading_title'   => 'Ivan is talking about how he learnt English:',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,
    'reading_allow_html' => true,

    'passage' => [
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">My name is Ivan and I am from Peru. My question is how did you learn English?</div>',

        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">Well, it all started when I was in high school, and my teacher told me I had a good command of the English language, and that I should study it to speak it fluently.</div>',

        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">That motivated me, and I decided to change all of my habits and do things differently. I started to watch TV shows in English, movies in English.</div>',

        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">And pretty much everything in my life changed to the point where everything I did involved the English language. Little by little, I started to learn more, new words, new phrases.</div>',

        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">So I decided it was time to take it a step further, so I entered an institute and started to learn the English language professionally.</div>',

        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">Once in there, I entered into a website where I met a lot of people from all over the world speaking English, and so, to this day, some of these people continue to be my friends and I practice English with them every day.</div>',
    ],

    'questions' => [
        [
            'prompt'  => 'What helped him learn English?',
            'correct' => 'Watching movies',
            'options' => [
                'Reading books',
                'Watching movies',
            ],
        ],
        [
            'prompt'  => 'Who did he talk with?',
            'correct' => 'People online',
            'options' => [
                'Tourists',
                'People online',
            ],
        ],
        [
            'prompt'  => 'What did he do to improve even more?',
            'correct' => 'Join a school',
            'options' => [
                'Join a school',
                'Go overseas',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])