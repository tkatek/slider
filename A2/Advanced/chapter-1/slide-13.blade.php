<?php
$content = [
    'title'    => "Listening",
    'subtitle' => 'Listen to three people talking about their jobs. Then answer the questions',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'audio' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide13.mp3'),

    'script' => [
        'I’m from Senegal and I work as a cleaner. I’m on my feet all day, but <span class="text-red-500 dark:text-red-400 font-black">I don’t mind because I’m fit and strong and the work isn’t too hard.</span> But I have to clean the same offices every day, six days a week. The same offices! <span class="text-red-500 dark:text-red-400 font-black">That’s very boring.</span> And I only get about £7 an hour, which isn’t much at all. Britain is expensive and it’s difficult to live on so little money.',
        '',
        'I’m a programmer. I work for a software company in London. <span class="text-red-500 dark:text-red-400 font-black">I love my job.</span> I often have to solve quite difficult problems, which is difficult, and takes a lot of time, <span class="text-red-500 dark:text-red-400 font-black">but I really enjoy it.</span> I love the feeling at the end of the day when I have solved a really difficult problem',
    ],

    'questions' => [
        [
            'prompt'  => 'The cleaner:',
            'correct' => 'doesn’t mind his job',
            'options' => [
                'loves his job',
                'doesn’t mind his job',
                'hates his job',
            ],
        ],
        [
            'prompt'  => 'The programmer:',
            'correct' => 'loves his job',
            'options' => [
                'doesn’t like his job',
                'loves his job',
                'thinks it’s boring',
            ],
        ],
        [
            'prompt'  => 'The cleaner works five days a week.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'He thinks his job is boring.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'He earns a lot of money.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'The programmer solves problems at work.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'He feels happy when he finishes his work.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])