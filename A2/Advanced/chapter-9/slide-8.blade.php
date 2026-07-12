<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-9/video/fluent-encrypted/fluent.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-9/img/slide8.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            // Answer ends at 26.5 seconds.
            // Silent gap: 26.5–27 seconds.
            'time' => 26700,
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
            // Answer ends at 53 seconds.
            // Silent gap: 53–54 seconds.
            'time' => 53200,
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
            // Answer ends at 59 seconds.
            // Silent gap: 59–59.7 seconds.
            'time' => 59200,
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
            // Answer ends at 92.5 seconds.
            // Silent gap: 92.5–92.7 seconds.
            'time' => 92600,
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
            // Answer ends at 103 seconds.
            // Silent gap: 103–104 seconds.
            'time' => 103200,
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
            'end' => 7.5,
            'text' => 'Today we’re going to talk about six things you should do every day if you want to become fluent in English.',
        ],
        [
            'start' => 8,
            'end' => 16,
            'text' => 'Learning English can feel difficult because there is grammar, vocabulary, pronunciation, and many other things to learn.',
        ],
        [
            'start' => 16,
            'end' => 21.5,
            'text' => 'But if you practise these six habits every day, you will see real progress.',
        ],
        [
            'start' => 22,
            'end' => 26.5,
            'text' => 'Speak English every day. Speaking is the most important skill.',
        ],
        [
            'start' => 27,
            'end' => 34,
            'text' => 'Many students study grammar but forget to practise speaking. Even if you are alone, speak English at home.',
        ],
        [
            'start' => 34.5,
            'end' => 42,
            'text' => 'You can talk to yourself, read aloud, or practise in front of a mirror. This helps build confidence and improve pronunciation.',
        ],
        [
            'start' => 43,
            'end' => 48,
            'text' => 'Change your phone to English. Set your phone and computer to English.',
        ],
        [
            'start' => 48,
            'end' => 53,
            'text' => 'This helps you see English every day and learn common words and phrases naturally.',
        ],
        [
            'start' => 54,
            'end' => 59,
            'text' => 'Listen to English often. Listen to podcasts, videos, or audiobooks every day.',
        ],
        [
            'start' => 59.7,
            'end' => 66.5,
            'text' => 'You can listen while cooking, cleaning, or travelling. Listening regularly helps English sound more natural.',
        ],
        [
            'start' => 67,
            'end' => 75,
            'text' => 'Practise pronunciation. Some English sounds are difficult, like “th” or the difference between “ship” and “sheep.”',
        ],
        [
            'start' => 75,
            'end' => 81,
            'text' => 'Watch native speakers and repeat after them. Use a mirror to see how your mouth moves.',
        ],
        [
            'start' => 82,
            'end' => 86,
            'text' => 'Keep a journal. Write a few sentences in English every day.',
        ],
        [
            'start' => 86,
            'end' => 92.5,
            'text' => 'Write about your day, your feelings, or your plans. Writing helps you organize sentences and remember vocabulary.',
        ],
        [
            'start' => 92.7,
            'end' => 97,
            'text' => 'Speak with other people. Try to talk with English speakers or other learners.',
        ],
        [
            'start' => 97.5,
            'end' => 103,
            'text' => 'Don’t be afraid of mistakes. Speaking with others helps you become more fluent and confident.',
        ],
        [
            'start' => 104,
            'end' => 108.5,
            'text' => 'Remember: start small, practise every day, and stay consistent.',
        ],
        [
            'start' => 109,
            'end' => 112,
            'text' => 'Little by little, your English will improve.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])