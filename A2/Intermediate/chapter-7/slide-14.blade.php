<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading passage',
    'title'           => 'Reading Passage',
    'subtitle'        => 'Read the passage and answer the questions',
    'reading_title'   => "Jill's Trip to Japan",
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,
    'reading_allow_html' => true,

    'passage' => [
        '<div class="text-[0.88rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.92rem] lg:text-[0.96rem]">Next month, Jill is going to visit Japan with her two best friends, Sara and Hanna. It is her first time visiting an Asian country. They will fly to Tokyo and arrive in the evening. They will go to their hotel and rest.</div>',
        '<div class="text-[0.88rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.92rem] lg:text-[0.96rem]">On November 13, they will visit famous places in Tokyo and try sushi and ramen.</div>',
        '<div class="text-[0.88rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.92rem] lg:text-[0.96rem]">On November 14, they are going to DisneySea. Jill loves roller coasters, but Sara doesn\'t.</div>',
        '<div class="text-[0.88rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.92rem] lg:text-[0.96rem]">On November 15, they will travel to Hakone by train to see Mt. Fuji and take photos.</div>',
        '<div class="text-[0.88rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.92rem] lg:text-[0.96rem]">On November 16, they will go shopping and buy souvenirs.</div>',
        '<div class="text-[0.88rem] font-semibold leading-snug text-slate-600 dark:text-slate-300 sm:text-[0.92rem] lg:text-[0.96rem]">On November 17, they will return home. Jill will feel sad to leave Japan.</div>',
    ],

    'questions' => [
        [
            'prompt'  => 'Jill is going to Japan with her friends.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => "This is Jill's first trip to Japan.",
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'They will arrive in Tokyo in the morning.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Jill and her friends will try Japanese food.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Sara enjoys roller coasters.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'They will travel to Hakone by train.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Jill will take photos of Mt. Fuji.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'They are going to buy souvenirs.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Jill will feel happy to leave Japan.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'They will stay in Japan for several days.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
