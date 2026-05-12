<?php
$content = [
    'video'     => materialAsset('slider/A2/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-8/img/slide8.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'What does the speaker say about success?',
            'options' => [
                'Success needs risks.',
                'Success is easy.',
                'Success needs luck only.',
                'Success comes quickly.',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => 'What did the speaker do after failing an audition?',
            'options' => [
                'He quit acting.',
                'He became angry.',
                'He tried again.',
                'He changed jobs.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 62000,
            'type' => 'multiple_choice',
            'question' => 'What does “Fall forward” mean?',
            'options' => [
                'Stop trying',
                'Learn from failure',
                'Avoid risks',
                'Forget mistakes',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 82000,
            'type' => 'multiple_choice',
            'question' => 'Why does the speaker mention Reggie Jackson and Thomas Edison?',
            'options' => [
                'To show famous people',
                'To show people who failed and succeeded',
                'To show rich people',
                'To show actors',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 112000,
            'type' => 'multiple_choice',
            'question' => 'According to the video, what can help define your life?',
            'options' => [
                'Your failures only',
                'Your school only',
                'Your choices and risks',
                'Your friends only',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 7,
            'text' => 'I learned that nothing in life is important unless you take risks.',
        ],
        [
            'start' => 7,
            'end' => 13,
            'text' => 'Nelson Mandela said: “There is no passion in playing small.”',
        ],
        [
            'start' => 13,
            'end' => 22,
            'text' => 'In the acting business, people fail many times. Early in my career, I auditioned for a musical, but I did not get the job.',
        ],
        [
            'start' => 22,
            'end' => 34,
            'text' => 'But I did not quit. I prepared for the next audition, and the next one. I failed many times, but I continued trying.',
        ],
        [
            'start' => 34,
            'end' => 42,
            'text' => 'Every failure can help you move closer to success.',
        ],
        [
            'start' => 42,
            'end' => 55,
            'text' => 'For example, baseball player Reggie Jackson failed many times, but people remember his success.',
        ],
        [
            'start' => 55,
            'end' => 65,
            'text' => 'Thomas Edison also failed many experiments before inventing the light bulb.',
        ],
        [
            'start' => 65,
            'end' => 72,
            'text' => 'The important thing is: “Fall forward.”',
        ],
        [
            'start' => 72,
            'end' => 82,
            'text' => 'This means learning from failure and continuing to try.',
        ],
        [
            'start' => 82,
            'end' => 94,
            'text' => 'If you want something new, you must do something new. You must take risks and believe in yourself.',
        ],
        [
            'start' => 94,
            'end' => 108,
            'text' => 'In the end, your choices, the people you meet, and the risks you take will help define your life.',
        ],
        [
            'start' => 108,
            'end' => 116,
            'text' => 'So remember: “Don’t be afraid to fail. Fall forward.”',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])