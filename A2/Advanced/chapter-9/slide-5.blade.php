<?php
$content = [
    'video'     => materialAsset('slider/A2/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-9/img/slide5.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'What does the speaker say is the most important skill?',
            'options' => [
                'Writing',
                'Grammar',
                'Speaking',
                'Reading',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 30000,
            'type' => 'multiple_choice',
            'question' => 'Why should students change their phone to English?',
            'options' => [
                'To play games',
                'To see English every day',
                'To watch movies',
                'To learn grammar rules',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 48000,
            'type' => 'multiple_choice',
            'question' => 'What can students listen to every day?',
            'options' => [
                'Podcasts and videos',
                'Only music',
                'Only grammar lessons',
                'Sports programs only',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 78000,
            'type' => 'multiple_choice',
            'question' => 'What does the speaker say students should write in a journal?',
            'options' => [
                'Long stories only',
                'Grammar exercises',
                'Their daily activities and feelings',
                'Difficult vocabulary lists',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 98000,
            'type' => 'multiple_choice',
            'question' => 'According to the speaker, what helps students become more fluent?',
            'options' => [
                'Avoiding mistakes',
                'Studying once a week',
                'Speaking with other people',
                'Memorizing dictionaries',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 7,
            'text' => 'Today we’re going to talk about six things you should do every day if you want to become fluent in English.',
        ],
        [
            'start' => 7,
            'end' => 16,
            'text' => 'Learning English can feel difficult because there is grammar, vocabulary, pronunciation, and many other things to learn.',
        ],
        [
            'start' => 16,
            'end' => 23,
            'text' => 'But if you practise these six habits every day, you will see real progress.',
        ],
        [
            'start' => 23,
            'end' => 31,
            'text' => 'First, speak English every day. Speaking is the most important skill.',
        ],
        [
            'start' => 31,
            'end' => 42,
            'text' => 'Many students study grammar but forget to practise speaking. Even if you are alone, speak English at home.',
        ],
        [
            'start' => 42,
            'end' => 51,
            'text' => 'You can talk to yourself, read aloud, or practise in front of a mirror. This helps build confidence and improve pronunciation.',
        ],
        [
            'start' => 51,
            'end' => 61,
            'text' => 'Second, change your phone to English. Set your phone and computer to English.',
        ],
        [
            'start' => 61,
            'end' => 69,
            'text' => 'This helps you see English every day and learn common words and phrases naturally.',
        ],
        [
            'start' => 69,
            'end' => 79,
            'text' => 'Third, listen to English often. Listen to podcasts, videos, or audiobooks every day.',
        ],
        [
            'start' => 79,
            'end' => 88,
            'text' => 'You can listen while cooking, cleaning, or travelling. Listening regularly helps English sound more natural.',
        ],
        [
            'start' => 88,
            'end' => 100,
            'text' => 'Fourth, practise pronunciation. Some English sounds are difficult, like “th” or the difference between “ship” and “sheep.”',
        ],
        [
            'start' => 100,
            'end' => 110,
            'text' => 'Watch native speakers and repeat after them. Use a mirror to see how your mouth moves.',
        ],
        [
            'start' => 110,
            'end' => 121,
            'text' => 'Fifth, keep a journal. Write a few sentences in English every day.',
        ],
        [
            'start' => 121,
            'end' => 131,
            'text' => 'Write about your day, your feelings, or your plans. Writing helps you organize sentences and remember vocabulary.',
        ],
        [
            'start' => 131,
            'end' => 142,
            'text' => 'Sixth, speak with other people. Try to talk with English speakers or other learners.',
        ],
        [
            'start' => 142,
            'end' => 151,
            'text' => 'Don’t be afraid of mistakes. Speaking with others helps you become more fluent and confident.',
        ],
        [
            'start' => 151,
            'end' => 160,
            'text' => 'Remember: start small, practise every day, and stay consistent.',
        ],
        [
            'start' => 160,
            'end' => 166,
            'text' => 'Little by little, your English will improve.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])