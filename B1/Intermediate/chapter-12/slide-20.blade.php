<?php
$content = [
    'title'    => 'Reading Comprehension',
    'subtitle' => 'Read & answer the questions',
    'type'     => 'text',

    'questions' => [
        [
            'prompt'  => 'What does open-mindedness mean?',
            'correct' => 'Being willing to consider new ideas and different perspectives.',
            'options' => [
                'Being stubborn about your ideas.',
                'Being willing to consider new ideas and different perspectives.',
                'Agreeing with everyone all the time.',
                'Ignoring other people’s opinions.',
            ],
        ],
        [
            'prompt'  => 'What is the first step of being open-minded?',
            'correct' => 'Listening with respect.',
            'options' => [
                'Giving your opinion.',
                'Listening with respect.',
                'Changing your mind.',
                'Arguing your point.',
            ],
        ],
        [
            'prompt'  => 'Why should we ask questions?',
            'correct' => 'To understand before we judge.',
            'options' => [
                'To show we are smarter.',
                'To understand before we judge.',
                'To make people angry.',
                'To win arguments.',
            ],
        ],
        [
            'prompt'  => 'What does the text say about being wrong?',
            'correct' => 'It is okay because we can learn and change.',
            'options' => [
                'It is always bad.',
                'It means you are not intelligent.',
                'It is okay because we can learn and change.',
                'It should never happen.',
            ],
        ],
        [
            'prompt'  => 'What is one benefit of being open-minded?',
            'correct' => 'We create trust and cooperation.',
            'options' => [
                'We always have the same opinion.',
                'We create trust and cooperation.',
                'We don’t need friends.',
                'We avoid learning new things.',
            ],
        ],
        [
            'prompt'  => 'Open-minded people do not listen to others.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'We should try to understand before judging.',
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'Our differences make the world boring.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'It is important to respect other people’s beliefs.',
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'Everyone always sees situations in the same way.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])