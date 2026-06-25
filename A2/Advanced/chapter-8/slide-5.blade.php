<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-8/video/risks-encrypted/risks.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-8/img/slide5.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            'time' => 5200,
            'type' => 'multiple_choice',
            'question' => '1. What does the speaker say about success?',
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
            'time' => 30200,
            'type' => 'multiple_choice',
            'question' => '2. What did the speaker do after failing an audition?',
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
            'time' => 42700,
            'type' => 'multiple_choice',
            'question' => '3. Why does the speaker mention Reggie Jackson and Thomas Edison?',
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
            'time' => 49700,
            'type' => 'multiple_choice',
            'question' => '4. What does “Fall forward” mean?',
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
            'time' => 63700,
            'type' => 'multiple_choice',
            'question' => '5. According to the video, what can help define your life?',
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
            'end' => 5,
            'text' => 'I learned that nothing in life is important unless you take risks.',
        ],
        [
            'start' => 5.5,
            'end' => 9.5,
            'text' => 'Nelson Mandela said: “There is no passion in playing small.”',
        ],
        [
            'start' => 10,
            'end' => 17.5,
            'text' => 'In the acting business, people fail many times. Early in my career, I auditioned for a musical, but I did not get the job.',
        ],
        [
            'start' => 17.7,
            'end' => 27,
            'text' => 'But I did not quit. I prepared for the next audition, and the next one. I failed many times, but I continued trying.',
        ],
        [
            'start' => 27,
            'end' => 30,
            'text' => 'Every failure can help you move closer to success.',
        ],
        [
            'start' => 30.7,
            'end' => 37,
            'text' => 'For example, baseball player Reggie Jackson failed many times, but people remember his success.',
        ],
        [
            'start' => 37.7,
            'end' => 42.5,
            'text' => 'Thomas Edison also failed many experiments before inventing the light bulb.',
        ],
        [
            'start' => 43,
            'end' => 46,
            'text' => 'The important thing is: “Fall forward.”',
        ],
        [
            'start' => 46.5,
            'end' => 49.5,
            'text' => 'This means learning from failure and continuing to try.',
        ],
        [
            'start' => 50,
            'end' => 56.5,
            'text' => 'If you want something new, you must do something new. You must take risks and believe in yourself.',
        ],
        [
            'start' => 57,
            'end' => 63.5,
            'text' => 'In the end, your choices, the people you meet, and the risks you take will help define your life.',
        ],
        [
            'start' => 64,
            'end' => 68,
            'text' => 'So remember: “Don’t be afraid to fail. Fall forward.”',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])