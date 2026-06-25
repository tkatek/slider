<?php

$content = [
    'type' => 'reading',

    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read & answer the questions',

    'reading_allow_html' => true,

    'passage' => 'A new report describes life in 100 years. There are many tall <span class="font-black text-amber-500 dark:text-amber-300">skyscrapers</span>, <span class="font-black text-amber-500 dark:text-amber-300">underwater cities</span>, and holidays in space. <span class="font-black text-rose-500 dark:text-rose-300">Experts</span> on space and <span class="font-black text-rose-500 dark:text-rose-300">architecture</span> gave their ideas on life in 2116. They said the way we live, work and play will be totally different. They said that 25 years ago, people could not imagine how the Internet would change our lives and how we communicate and learn. The changes in the next century will be more <span class="font-black text-rose-500 dark:text-rose-300">unbelievable</span>.',

    'questions' => [
        [
            'prompt'  => 'What are two things people may have in 2116?',
            'correct' => 'Underwater cities and holidays in space',
            'options' => [
                'Underwater cities and holidays in space',
                'Flying cars and robot teachers',
                'Moon schools and underground farms',
                'New airplanes and electric cars',
            ],
        ],
        [
            'prompt'  => "How did the Internet change people's lives?",
            'correct' => 'It helped people communicate and learn in new ways',
            'options' => [
                'It helped people communicate and learn in new ways',
                'It made people stop working',
                'It made people live underwater',
                'It helped people travel to space',
            ],
        ],
        [
            'prompt'  => 'What does the report describe?',
            'correct' => 'Life in 100 years',
            'options' => [
                'Life 50 years ago',
                'Life in 100 years',
                'Life on another planet today',
                'Life in the 19th century',
            ],
        ],
        [
            'prompt'  => 'Which of the following is mentioned as a feature of life in 2116?',
            'correct' => 'Underwater cities',
            'options' => [
                'Flying cars only',
                'Underground farms',
                'Underwater cities',
                'Moon schools',
            ],
        ],
        [
            'prompt'  => 'What example is given to show how much life can change?',
            'correct' => 'The Internet changing how we communicate and learn',
            'options' => [
                'The invention of airplanes',
                'The discovery of electricity',
                'The development of robots',
                'The Internet changing how we communicate and learn',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
