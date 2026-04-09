<?php
$content = [
    'video' => materialAsset('slider/A1/Beginner/chapter-12/video/bill-encrypted/bill.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-12/video/thumbnail-paying-bills.webp'),
    'isQuiz' => 0,

    'questions' => [
        [
            'time' => 5500,
            'type' => 'multiple_choice',
            'question' => '1. Why does the customer go to the bank?',
            'options' => ['To open a new account', 'To pay the electric bill', 'To buy a new card', 'To send a letter'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => '2. What does the teller ask the customer to show?',
            'options' => ['A passport', 'The bill', 'A photo', 'A phone'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 19500,
            'type' => 'multiple_choice',
            'question' => '3. How much is the bill?',
            'options' => ['45.60 dollars', '15 dollars', '100 dollars', '5.60 dollars'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 23000,
            'type' => 'multiple_choice',
            'question' => '4. How does the customer pay?',
            'options' => ['By cash', 'By check', 'By card', 'Online'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 33000,
            'type' => 'multiple_choice',
            'question' => '5. What does the teller give at the end?',
            'options' => ['A new account', 'A receipt', 'A bill', 'A credit card'],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 2.5,  'text' => 'Hello. How can I help you today?'],
        ['start' => 3,  'end' => 5.5,  'text' => 'Hi. I need to pay my electric bill.'],
        ['start' => 5.5,  'end' => 10,  'text' => 'Sure. Do you have your bill with you?'],
        ['start' => 11,  'end' => 12.5, 'text' => 'Yes. Here it is.'],
        ['start' => 13.3, 'end' => 17, 'text' => 'Thank you. Your total is $45.60.'],
        ['start' => 17, 'end' => 19.5, 'text' => 'Will you pay by cash or card?'],
        ['start' => 20, 'end' => 22.5, 'text' => "I'll pay by card, please."],
        ['start' => 23, 'end' => 26.5, 'text' => 'OK. Please insert your card here.'],

        ['start' => 27.5, 'end' => 31, 'text' => 'All done! Here is your receipt.'],
        ['start' => 31.8, 'end' => 33, 'text' => 'Great, thank you!'],
        ['start' => 33.5, 'end' => 36, 'text' => 'You’re welcome. Have a nice day!'],
    ]
];

?>
@include("slider.video.interactive", ['content' => $content])