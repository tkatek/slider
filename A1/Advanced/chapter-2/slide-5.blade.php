<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-1/video/encrypted/'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-2/img/slide5.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 25000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: What time does the guest request the wake-up call for?',
            'options' => ['5:00 a.m.', '5:30 a.m.', '6:00 a.m.', '7:30 a.m.'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 44000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: What else does the guest ask to be delivered to the room after the wake-up call?',
            'options' => ['A newspaper and coffee', 'Room service and a towel', 'Breakfast and a pot of tea', 'Just a pot of tea'],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 64000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: What time does the guest request a taxi to the airport for?',
            'options' => ['5:30 a.m.', '6:30 a.m.', '7:00 a.m.', '7:30 a.m.'],
            'correct_answer' => 4,
            'points' => 10
        ],
        [
            'time' => 35000,
            'type' => 'input',
            'question' => 'Question 4: The guest needs a ________ call because they have a plane to catch tomorrow morning.',
            'accepted_answers' => 'wake-up,wake up',
            'points' => 10
        ],
        [
            'time' => 68000,
            'type' => 'input',
            'question' => 'Question 5: The receptionist arranges for a ________ to the airport for 7:30 a.m.',
            'accepted_answers' => 'taxi',
            'points' => 10
        ]
    ],
    'subtitles'  => [
        ['start' => 15, 'end' => 20, 'text' => 'Receptionist: Hello. I am Kieran. Yes sir, how may I help you today?'],
        ['start' => 20, 'end' => 29, 'text' => 'Guest: I have a plane to catch tomorrow morning and I can’t miss it. Is it possible to arrange a wake-up call for 5:30 a.m.?'],
        ['start' => 29, 'end' => 33, 'text' => 'Receptionist: Yes, I am arranging that right now. What’s your room number?'],
        ['start' => 33, 'end' => 36, 'text' => 'Guest: I am staying in room 306.'],
        ['start' => 36, 'end' => 44, 'text' => 'Receptionist: Okay, you will get your wake-up call at 5:30 in the morning. Is there anything else I can help you with today?'],
        ['start' => 44, 'end' => 49, 'text' => 'Guest: Yes, I’d like to have some breakfast and a pot of tea delivered to my room after my wake-up call.'],
        ['start' => 49, 'end' => 54, 'text' => 'Receptionist: All right.'],
        ['start' => 54, 'end' => 58, 'text' => 'Guest: Yeah, that’ll be all for now. I will settle my bill when I check out in the morning.'],
        ['start' => 58, 'end' => 62, 'text' => 'Receptionist: Would you also like me to arrange a taxi to the airport for you?'],
        ['start' => 62, 'end' => 66, 'text' => 'Guest: Yes, that would be great. Can you order one for 7:30 a.m.?'],
        ['start' => 66, 'end' => 70, 'text' => 'Receptionist: Yes, that will be fine. Is that all?'],
        ['start' => 70, 'end' => 72, 'text' => 'Guest: Yes, thanks for all your help.'],
        ['start' => 72, 'end' => 76, 'text' => 'Receptionist: It was my pleasure. Have a nice day.'],
        ['start' => 76, 'end' => 78, 'text' => 'Guest: Thanks, and you too.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])