<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-1/videos/hotel-encrypted/hotel.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-1/videos/thumbnail.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 9400,
            'type' => 'multiple_choice',
            'question' => 'Question 1: What is the name of the person checking into the hotel?',
            'options' => ['Tony Stark', 'Tony Montana', 'Tony McKay', 'Tony Soprano'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 13400,
            'type' => 'multiple_choice',
            'question' => 'Question 2: How many nights did Mr. McKay originally reserve a single room for?',
            'options' => ['Two nights', 'Three nights', 'Four nights', 'Five nights'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 38350,
            'type' => 'multiple_choice',
            'question' => 'Question 3: What is included when Mr. McKay upgrades to the deluxe room?',
            'options' => ['Dinner and a spa', 'Breakfast and gym access', 'Free parking and a city tour', 'Room service and a movie pass'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 55500,
            'type' => 'input',
            'question' => 'Question 4: Breakfast at the hotel is served from 6:00 a.m. to ________ a.m.',
            'accepted_answers' => '9:00',
            'points' => 10
        ]
    ],
    // Video script (subtitles)
    'subtitles'  => [
        ['start' => 0,  'end' => 2.5,  'text' => 'Hotel Clerk: Hello sir, how may I help you?'],
        ['start' => 2.5,  'end' => 4.5, 'text' => 'Tony McKay: I have a reservation for tonight.'],
        ['start' => 4.5, 'end' => 6.5, 'text' => 'Hotel Clerk: Okay, may I have your name, please?'],
        ['start' => 7, 'end' => 9, 'text' => 'Tony McKay: My name is Tony McKay.'],
        ['start' => 9.8, 'end' => 13, 'text' => 'Hotel Clerk: Hello, Mr. McKay. You reserved a single room for four nights?'],
        ['start' => 13.8, 'end' => 15, 'text' => 'Tony McKay: Yes, that’s correct.'],
        ['start' => 15, 'end' => 17, 'text' => 'Hotel Clerk: May I see some form of ID, please?'],
        ['start' => 18, 'end' => 19, 'text' => 'Tony McKay: Yes, here you are.'],
        ['start' => 19, 'end' => 24, 'text' => 'Hotel Clerk: Thanks, Mr. McKay. I need a credit card to put on file in case you use the minibar.'],
        ['start' => 24.7, 'end' => 26, 'text' => 'Tony McKay: Okay, here you are.'],
        ['start' => 26, 'end' =>27, 'text' => 'Hotel Clerk: Thanks.'],
        ['start' => 28.7, 'end' => 32, 'text' => 'Hotel Clerk: Would you like to upgrade to a deluxe room for only $20 per night?'],
        ['start' => 32, 'end' => 34, 'text' => 'Tony McKay: What does the deluxe room include?'],
        ['start' => 34, 'end' => 38, 'text' => 'Hotel Clerk: The deluxe room includes breakfast and you can use the gym.'],
        ['start' => 38.7, 'end' => 41, 'text' => 'Tony McKay: That sounds great! Yes, I’ll upgrade.'],
        ['start' => 41, 'end' => 43, 'text' => 'Hotel Clerk: Okay, can you please sign here?'],
        ['start' => 45.5, 'end' => 47, 'text' => 'Tony McKay: Yes, no problem.'],
        ['start' => 49.7, 'end' => 55.5, 'text' => 'Hotel Clerk: You are in room 24:07. Please take the elevators on the right. Breakfast is from 6:00 to 9:00 a.m.'],
        ['start' => 55.5, 'end' => 57, 'text' => 'Tony McKay: That’s great! Thank you very much.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])
