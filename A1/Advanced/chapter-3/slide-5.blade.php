<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-3/video/checkout-encrypted/checkout.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-3/img/checkout.webp'),
    'isQuiz'     => 0,

    'questions' => [
        [
            'time' => 4200,
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
            'time' => 10200,
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
            'time' => 20200,
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
        ['start' => 0,    'end' => 2.5,  'text' => 'How was your stay, sir?'],
        ['start' => 2.5,  'end' => 4,    'text' => 'Oh, it was great!'],
        ['start' => 4.5,  'end' => 6.5,  'text' => 'Is there anything you would want us to improve?'],
        ['start' => 7,    'end' => 8.5,  'text' => 'No, no. Everything is good.'],
        ['start' => 8.5,  'end' => 10,   'text' => 'Have you booked my airport drop service?'],
        ['start' => 10.5, 'end' => 12,   'text' => 'Yes, sir. It will be here soon.'],
        ['start' => 12.5, 'end' => 15,   'text' => 'Okay, I am here in the lobby. Let me know when it has arrived.'],
        ['start' => 15.8, 'end' => 18.8, 'text' => 'Sure, sir! Meanwhile, could you please sign our guestbook?'],
        ['start' => 18.8, 'end' => 20,   'text' => 'Yeah, definitely.'],
        ['start' => 20.7, 'end' => 23,   'text' => 'Thanks, sir! And the cab has arrived too.'],
        ['start' => 23,   'end' => 27,   'text' => 'Oh, that’s great. Can you just arrange someone who would keep my bag in the car?'],
        ['start' => 27.5, 'end' => 28.5, 'text' => 'Oh yes, he will help you there.'],
        ['start' => 28.5, 'end' => 29.7, 'text' => 'Thank you!'],
        ['start' => 29.7, 'end' => 31,   'text' => 'Thank you, sir. Hope to see you again.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])