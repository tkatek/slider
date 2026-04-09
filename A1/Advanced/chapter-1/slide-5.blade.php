<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-1/video/encrypted/'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-1/video/'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 19000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: What is the name of the person checking into the hotel?',
            'options' => ['Tony Stark', 'Tony Montana', 'Tony McKay', 'Tony Soprano'],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 23000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: How many nights did Mr. McKay originally reserve a single room for?',
            'options' => ['Two nights', 'Three nights', 'Four nights', 'Five nights'],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 50000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: What is included when Mr. McKay upgrades to the deluxe room?',
            'options' => ['Dinner and a spa', 'Breakfast and gym access', 'Free parking and a city tour', 'Room service and a movie pass'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 78000,
            'type' => 'input',
            'question' => 'Question 4: Breakfast at the hotel is served from 6:00 a.m. to ________ a.m.',
            'accepted_answers' => '9:00',
            'points' => 10
        ]
    ],
    // Video script (subtitles)
    'subtitles'  => [
        ['start' => 5,  'end' => 9,  'text' => 'Hotel Clerk: Hello sir, how may I help you?'],
        ['start' => 9,  'end' => 13, 'text' => 'Tony McKay: Yes, I have a reservation for tonight.'],
        ['start' => 13, 'end' => 16, 'text' => 'Hotel Clerk: Okay, may I have your name, please?'],
        ['start' => 16, 'end' => 19, 'text' => 'Tony McKay: My name is Tony McKay.'],
        ['start' => 19, 'end' => 23, 'text' => 'Hotel Clerk: Hello, Mr. McKay. You reserved a single room for four nights?'],
        ['start' => 23, 'end' => 24, 'text' => 'Tony McKay: Yes, that’s correct.'],
        ['start' => 24, 'end' => 28, 'text' => 'Hotel Clerk: May I see some form of ID, please?'],
        ['start' => 28, 'end' => 33, 'text' => 'Tony McKay: Yes, here you are.'],
        ['start' => 33, 'end' => 35, 'text' => 'Hotel Clerk: Thanks, Mr. McKay. I need a credit card to put on file in case you use the minibar.'],
        ['start' => 35, 'end' => 40, 'text' => 'Tony McKay: Okay, here you are.'],
        ['start' => 40, 'end' => 45, 'text' => 'Hotel Clerk: Thanks. Would you like to upgrade to a deluxe room for only $20 per night?'],
        ['start' => 45, 'end' => 48, 'text' => 'Tony McKay: What does the deluxe room include?'],
        ['start' => 48, 'end' => 50, 'text' => 'Hotel Clerk: The deluxe room includes breakfast and you can use the gym.'],
        ['start' => 50, 'end' => 55, 'text' => 'Tony McKay: That sounds great! Yes, I’ll upgrade.'],
        ['start' => 55, 'end' => 61, 'text' => 'Hotel Clerk: Okay, can you please sign here?'],
        ['start' => 61, 'end' => 69, 'text' => 'Tony McKay: Yes, no problem.'],
        ['start' => 69, 'end' => 78, 'text' => 'Hotel Clerk: You are in room 24:07. Please take the elevators on the right. Breakfast is from 6:00 to 9:00 a.m.'],
        ['start' => 78, 'end' => 82, 'text' => 'Tony McKay: That’s great! Thank you very much.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])