<?php
$content = [
    'video'     => materialAsset('slider/A1/Beginner/chapter-10/video/encrypted/clothing.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-10/video/clothing.webp'),
    'isQuiz' => 0,

    'questions' => [
        [
            'time' => 19000,
            'type' => 'multiple_choice',
            'question' => '1. What colour jacket is the customer looking for?',
            'options' => ['Brown', 'Black', 'Blue'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 43000,
            'type' => 'input',
            'question' => '2. The customer is looking for brown ............ (fill in)',
            'accepted_answers' => ['pants', 'brown pants'],
            'points' => 10
        ],
        [
            'time' => 50000,
            'type' => 'multiple_choice',
            'question' => '3. What size pants does the customer want?',
            'options' => ['Small', 'Medium', 'Large'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 65000,
            'type' => 'multiple_choice',
            'question' => '4. What item is the customer shopping for in Part Three?',
            'options' => ['Pants', 'Shoes', 'Jackets'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 79000,
            'type' => 'multiple_choice',
            'question' => '5. The customer is looking for blue shoes in size 36.',
            'options' => ['True', 'False'],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 4, 'text' => 'Shopping for cloths, colors and sizes'],
        ['start' => 4, 'end' => 8, 'text' => 'Salesperson: Good afternoon. Can I help you?'],
        ['start' => 8, 'end' => 10.5, 'text' => "Customer: Yes, please. I'm looking for a jacket."],
        ['start' => 11, 'end' => 15, 'text' => 'Salesperson: Jacket? Okay. What color are you looking for?'],
        ['start' => 15, 'end' => 18, 'text' => "Customer: I'm looking for a black jacket."],
        ['start' => 18, 'end' => 22.5, 'text' => 'Salesperson: Black. Okay. And what size are you looking for?'],
        ['start' => 23, 'end' => 25, 'text' => "Customer: I'm looking for a medium."],
        ['start' => 25, 'end' => 28, 'text' => 'Salesperson: All right, a black jacket in medium. Here you are.'],
        ['start' => 28.5, 'end' => 30, 'text' => "Customer: Ooh, that's nice!"],

        ['start' => 32, 'end' => 34, 'text' => 'Salesperson: Good morning. Can I help you?'],
        ['start' => 34.5, 'end' => 37, 'text' => "Customer: Yes, please. I'm looking for some pants."],
        ['start' => 37.5, 'end' => 41, 'text' => 'Salesperson: Pants? Okay. What color are you looking for?'],
        ['start' => 41, 'end' => 45, 'text' => "Customer: Brown. I'm looking for some brown pants."],
        ['start' => 45, 'end' => 48, 'text' => 'Salesperson: Brown. Okay. And what size are you looking for?'],
        ['start' => 48, 'end' => 50, 'text' => "Customer: Large. I'm looking for large."],
        ['start' => 50, 'end' => 55, 'text' => 'Salesperson: Large. All right, some brown pants in large. Here you are.'],
        ['start' => 55, 'end' => 56, 'text' => "Customer: Ooh, they're nice!"],

        ['start' => 58, 'end' => 62, 'text' => 'Salesperson: Good afternoon. Can I help you?'],
        ['start' => 62, 'end' => 64, 'text' => "Customer: Yes, please. I'm looking for some shoes."],
        ['start' => 64, 'end' => 68, 'text' => 'Salesperson: Okay. What color are you looking for?'],
        ['start' => 68, 'end' => 71.5, 'text' => "Customer: Blue. I'm looking for some blue shoes."],
        ['start' => 71.5, 'end' => 74, 'text' => 'Salesperson: Blue. Okay. And what size are you looking for?'],
        ['start' => 74, 'end' => 78, 'text' => "Customer: Size 36. I'm looking for size 36."],
        ['start' => 78, 'end' => 83, 'text' => 'Salesperson: Size 36. All right, some blue shoes in size 36. Here you are.'],
        ['start' => 83, 'end' => 85, 'text' => 'Customer: Great thank you'],
    ],
];

?>
@include("slider.video.interactive", ['content' => $content])