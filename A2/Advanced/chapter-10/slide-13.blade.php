<?php

$content = [
    'type' => 'reading',
    'page_title'         => 'Reading Comprehension',
    'title'              => 'Reading Comprehension',
    'subtitle'           => 'Answer the following questions about the text',
    'reading_title'      => 'Noisy Neighbours',
    'reading_align'      => 'left',
    'reading_plain'      => true,
    'reading_compact'    => true,
    'reading_allow_html' => true,

    'passage' => [
        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">Emma lives in an apartment building. Her neighbours upstairs are very noisy. They play loud music at night and sometimes move furniture after midnight. Emma cannot sleep well, and she feels tired every morning.</div>',

        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">One evening, Emma knocked on her neighbours&rsquo; door and spoke politely to them. She said, “Excuse me, could you please lower the music at night?” The neighbours apologized and promised to be quieter.</div>',

        '<div class="text-[0.9rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.95rem] lg:text-[1rem]">After that, the building became much calmer, and Emma could sleep better.</div>',
    ],

    'questions' => [
        [
            'prompt'  => 'Why was Emma unhappy?',
            'correct' => 'Her neighbours were noisy',
            'options' => [
                'Her apartment was too small',
                'Her neighbours were noisy',
                'She lost her keys',
                'She did not like the building',
            ],
        ],
        [
            'prompt'  => 'What did the neighbours do at night?',
            'correct' => 'Played loud music',
            'options' => [
                'Cooked food',
                'Watched TV quietly',
                'Played loud music',
                'Cleaned the apartment',
            ],
        ],
        [
            'prompt'  => 'What happened after Emma spoke to her neighbours?',
            'correct' => 'They became quieter',
            'options' => [
                'They moved away',
                'They became quieter',
                'They argued with Emma',
                'They called the police',
            ],
        ],
        [
            'prompt'  => 'Emma lived in a house.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'Emma spoke politely to her neighbours.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'Emma could sleep better after talking to them.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
