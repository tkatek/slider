<?php
$content = [
    'video' => materialAsset('slider/A1/Beginner/chapter-12/video/bill-encrypted/bill.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-12/video/thumbnail-paying-bills.webp'),
    'isQuiz' => 0,

    'questions' => [
        [
            'time' => 8000,
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
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => '3. How much is the bill?',
            'options' => ['45.60 dollars', '15 dollars', '100 dollars', '5.60 dollars'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 25000,
            'type' => 'multiple_choice',
            'question' => '4. How does the customer pay?',
            'options' => ['By cash', 'By check', 'By card', 'Online'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 36000,
            'type' => 'multiple_choice',
            'question' => '5. What does the teller give at the end?',
            'options' => ['A new account', 'A receipt', 'A bill', 'A credit card'],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => 'Bank Teller: Hello. How can I help you today?'],
        ['start' => 3,  'end' => 6,  'text' => 'Customer: Hi. I need to pay my electric bill.'],
        ['start' => 6,  'end' => 9,  'text' => 'Bank Teller: Sure. Do you have your bill with you?'],
        ['start' => 9,  'end' => 11, 'text' => 'Customer: Yes. Here it is.'],
        ['start' => 11, 'end' => 16, 'text' => 'Bank Teller: Thank you. Your total is $45.60.'],
        ['start' => 16, 'end' => 20, 'text' => 'Bank Teller: Will you pay by cash or card?'],
        ['start' => 20, 'end' => 23, 'text' => "Customer: I'll pay by card, please."],
        ['start' => 23, 'end' => 28, 'text' => 'Bank Teller: OK. Please insert your card here.'],
        ['start' => 28, 'end' => 30, 'text' => '...'],
        ['start' => 30, 'end' => 35, 'text' => 'Bank Teller: All done! Here is your receipt.'],
        ['start' => 35, 'end' => 37, 'text' => 'Customer: Great, thank you!'],
        ['start' => 37, 'end' => 40, 'text' => 'Bank Teller: You’re welcome. Have a nice day!'],
    ]
];

?>
@include("slider.video.interactive", ['content' => $content])