<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-3/video/checkout-encrypted/checkout.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-3/img/checkout.webp'),
    'isQuiz'     => 1,

    'questions' => [
        [
            'time' => 6100,
            'type' => 'multiple_choice',
            'question' => "1) How was the visitor’s stay?",
            'options' => [
                'It was terrible.',
                'It was okay.',
                'It was great.',
                'It was boring.',
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 21200,
            'type' => 'multiple_choice',
            'question' => '2) What service did the visitor ask about?',
            'options' => [
                'Room service',
                'Airport drop service',
                'Breakfast',
                'Laundry',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 31200,
            'type' => 'multiple_choice',
            'question' => '3) What does the help desk ask the visitor to do?',
            'options' => [
                'Pay the bill',
                'Wait in the room',
                'Sign the guestbook',
                'Call a taxi',
            ],
            'correct_answer' => 2,
            'points' => 10
        ]
    ],

    'subtitles'  => [
        ['start' => 0,    'end' => 3.5,  'text' => 'How was your stay, sir?'],
        ['start' => 3.5,  'end' => 6,    'text' => 'Oh, it was great!'],
        ['start' => 6,    'end' => 10,   'text' => 'Is there anything you would want us to improve?'],
        ['start' => 10,   'end' => 13.5, 'text' => 'No, no. Everything is good.'],
        ['start' => 13.5, 'end' => 17.5, 'text' => 'Have you booked my airport drop service?'],
        ['start' => 17.5, 'end' => 21,   'text' => 'Yes, sir. It will be here soon.'],
        ['start' => 21,   'end' => 26,   'text' => 'Okay, I am here in the lobby. Let me know when it has arrived.'],
        ['start' => 26,   'end' => 31,   'text' => 'Sure, sir! Meanwhile, could you please sign our guestbook?'],
        ['start' => 31,   'end' => 33.5, 'text' => 'Yeah, definitely.'],
        ['start' => 33.5, 'end' => 38,   'text' => 'Thanks, sir! And the cab has arrived too.'],
        ['start' => 38,   'end' => 43.5, 'text' => 'Oh, that’s great. Can you just arrange someone who would keep my bag in the car?'],
        ['start' => 43.5, 'end' => 47.5, 'text' => 'Oh yes, he will help you there.'],
        ['start' => 47.5, 'end' => 49.5, 'text' => 'Thank you!'],
        ['start' => 49.5, 'end' => 53.5, 'text' => 'Thank you, sir. Hope to see you again.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])