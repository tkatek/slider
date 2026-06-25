<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-5/videos/hardest-thing-encrypted/hardest-thing.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-5/img/slide10.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 14200,
            'type'           => 'multiple_choice',
            'question'       => '1. What does the speaker really miss?',
            'options'        => [
                'Her dog.',
                'Her cat.',
                'Her school.',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 21200,
            'type'           => 'multiple_choice',
            'question'       => '2. What does the speaker miss from her mom?',
            'options'        => [
                'A hug and a kiss.',
                'A phone call.',
                'A birthday gift.',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
        [
            'time'           => 27200,
            'type'           => 'multiple_choice',
            'question'       => '3. What did the speaker focus on when she was homesick?',
            'options'        => [
                'Her friends.',
                'Her goals.',
                'Her classes.',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 43200,
            'type'           => 'multiple_choice',
            'question'       => '4. What kind of English did the speaker know at the beginning?',
            'options'        => [
                'British English.',
                'American English.',
                'Canadian English.',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 51800,
            'type'           => 'multiple_choice',
            'question'       => '5. Why was the first week difficult?',
            'options'        => [
                'Because she had to live with a new person.',
                'Because she lost her money.',
                'Because she could not find food.',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
        [
            'time'           => 62300,
            'type'           => 'multiple_choice',
            'question'       => '6. What does the speaker say about simple things?',
            'options'        => [
                'You need to forget them.',
                'You need to adapt to them.',
                'You need to avoid them.',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        [
            'start' => 5,
            'end'   => 13.5,
            'text'  => 'The hardest thing is that you kind of get homesick, of course, like missing your family. I really miss my cat.',
        ],
        [
            'start' => 15,
            'end'   => 21,
            'text'  => 'I miss a hug. I miss a kiss from my mom, you know, even her nagging.',
        ],
        [
            'start' => 21,
            'end'   => 27,
            'text'  => 'When I was homesick, I focused on my goals, so what I would like to be...',
        ],
        [
            'start' => 27.5,
            'end'   => 32,
            'text'  => 'Everything was new for us, so just take a map and start learning every single thing.',
        ],
        [
            'start' => 32,
            'end'   => 40,
            'text'  => 'I had a little bit of English at the beginning, and it was American English, so when I came here I had to relearn everything.',
        ],
        [
            'start' => 40,
            'end'   => 42.5,
            'text'  => 'And I didn’t know anything.',
        ],
        [
            'start' => 44,
            'end'   => 51,
            'text'  => 'The first week was difficult because when you arrive, you live with a new person, and it is difficult.',
        ],
        [
            'start' => 52.5,
            'end'   => 57.5,
            'text'  => 'Sometimes I miss simple things, like buying food in the streets for one dollar.',
        ],
        [
            'start' => 57.5,
            'end'   => 62,
            'text'  => 'But these are simple things that you just need to adapt to.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])