<?php
$content = [
    'title'    => 'Listen again and answer the questions',
    'subtitle' => 'Hana gives some tips about learning any language, especially English',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Advanced/chapter-9/audios/slide11.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        '<strong>Ben:</strong> Hana, you speak English very well. What advice can you give English learners?',
        '<strong>Hana:</strong> First, I think listening is very important. You can listen to English videos, podcasts, or websites for learners. Listening helps you understand pronunciation, vocabulary, and sentence patterns.',
        '<strong>Ben:</strong> Why is listening important?',
        '<strong>Hana:</strong> Because communication starts with understanding people. When you listen every day, your English improves naturally.',
        '<strong>Ben:</strong> Any other tips?',
        '<strong>Hana:</strong> Yes. Learning vocabulary and common phrases helped me a lot. Sometimes I understood the words, but not the real meaning. Learning phrases and idioms helped me understand native speakers better.',
        '<strong>Ben:</strong> Did you practise using them?',
        '<strong>Hana:</strong> Yes. I watched English TV shows and learned how people use expressions in real situations. At first, I was nervous, but I kept practising.',
        '<strong>Ben:</strong> What about writing?',
        '<strong>Hana:</strong> Reading helps writing a lot. When you read English stories or texts, you learn sentence structure and paragraph organization.',
        '<strong>Ben:</strong> Did you keep a journal?',
        '<strong>Hana:</strong> Yes. Writing in a journal helped me think carefully about grammar and vocabulary. It also helped me become more confident.',
        '<strong>Ben:</strong> Thank you for the advice.',
        '<strong>Hana:</strong> You’re welcome.',
    ],

    'questions' => [
        [
            'prompt'  => 'What skill did she learn first?',
            'correct' => 'Listening',
            'options' => [
                'Reading',
                'Listening',
                'Speaking',
            ],
        ],
        [
            'prompt'  => 'What does she say about idioms?',
            'correct' => 'Students should learn them.',
            'options' => [
                'Students should learn them.',
                'Students should not learn them.',
                'She hates them.',
            ],
        ],
        [
            'prompt'  => 'What does she say about writing?',
            'correct' => 'Reading helps writing.',
            'options' => [
                'She loves it.',
                'It is not important.',
                'Reading helps writing.',
            ],
        ],
        [
            'prompt'  => 'What tip does she give for writing?',
            'correct' => 'Keep a journal',
            'options' => [
                'Keep a journal',
                'Use Google translate',
                'Use a template',
            ],
        ],
        [
            'prompt'  => 'What tip does she give for speaking?',
            'correct' => 'She does not give any',
            'options' => [
                'Get a study buddy',
                'Speak to the mirror',
                'She does not give any',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])