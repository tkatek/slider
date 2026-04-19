<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-2/video/wake-up-call-encrypted/wake-up-call.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-2/img/slide5.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 18100,
            'type' => 'input',
            'question' => 'The guest needs a ________ call because they have a plane to catch tomorrow morning.',
            'accepted_answers' => 'wake-up,wake up',
            'points' => 10
        ],
        [
            'time' => 30200,
            'type' => 'multiple_choice',
            'question' => '1- What time does the guest request the wake-up call for?',
            'options' => ['5:00 a.m.', '5:30 a.m.', '6:00 a.m.', '7:30 a.m.'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 39600,
            'type' => 'multiple_choice',
            'question' => '2- What else does the guest ask to be delivered to their room after the wake-up call?',
            'options' => ['A newspaper and coffee', 'Room service and a towel', 'Breakfast and a pot of tea', 'Just a pot of tea'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 47600,
            'type' => 'input',
            'question' => 'The receptionist arranges for a ________ to the airport for 7:30 a.m.',
            'accepted_answers' => 'taxi',
            'points' => 10
        ],
        [
            'time' => 52100,
            'type' => 'multiple_choice',
            'question' => '3- What time does the guest request a taxi to the airport for?',
            'options' => ['5:30 a.m.', '6:30 a.m.', '7:00 a.m.', '7:30 a.m.'],
            'correct_answer' => 3,
            'points' => 10
        ]
    ],
    'subtitles' => [
        ['start' => 0,    'end' => 2.8,  'text' => 'Hello. I am Kieran.'],
        ['start' => 2.8,  'end' => 5.8,  'text' => 'Yes, sir. How may I help you today?'],
        ['start' => 5.2,  'end' => 9, 'text' => "I have a plane to catch tomorrow morning, and I can't miss it."],
        ['start' => 9, 'end' => 12, 'text' => 'Is it possible to arrange a wake-up call for 5:30 a.m.?'],
        ['start' => 12, 'end' => 16, 'text' => 'Yes, I am arranging that right now. What’s your room number?'],
        ['start' => 16, 'end' => 18, 'text' => 'I am staying in room 306.'],
        ['start' => 20, 'end' => 23, 'text' => 'Okay, you will get your wake-up call at 5:30 in the morning.'],
        ['start' => 23, 'end' => 26, 'text' => 'Is there anything else I can help you with today?'],
        ['start' => 26, 'end' => 29, 'text' => "Yes, I'd like to have some breakfast and a pot of tea delivered to my room"],
        ['start' => 29, 'end' => 30, 'text' => 'after my wake-up call.'],
        ['start' => 31.5, 'end' => 32.5, 'text' => 'All right.'],
        ['start' => 32.5, 'end' => 34, 'text' => "Yeah, that'll be all for now. I will settle my bill"],
        ['start' => 34, 'end' => 35.5, 'text' => 'when I check out in the morning.'],
        ['start' => 35.7, 'end' => 39.5, 'text' => 'Would you also like me to arrange a taxi to the airport for you?'],
        ['start' => 40, 'end' => 43, 'text' => 'Yes, that would be great. Can you order one for 7:30 a.m.?'],
        ['start' => 43, 'end' => 46, 'text' => 'Yes, that will be fine. Is that all?'],
        ['start' => 46, 'end' => 47.5, 'text' => 'Yes, thanks for all your help.'],
        ['start' => 48, 'end' => 50.5, 'text' => 'It was my pleasure. Have a nice day.'],
        ['start' => 50.5, 'end' => 52, 'text' => 'Thanks, and you too.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])