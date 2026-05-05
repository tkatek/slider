<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-5/video/vacation-encrypted/vacation.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-5/img/slide9.webp'),
    'isQuiz'     => 1,

    'questions' => [
        [
            'time' => 19500,
            'type' => 'multiple_choice',
            'question' => 'The flight was good.',
            'options' => [
                'True',
                'False'
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 24500,
            'type' => 'multiple_choice',
            'question' => 'The weather was nice.',
            'options' => [
                'True',
                'False'
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 38500,
            'type' => 'multiple_choice',
            'question' => 'The hotel room was quiet.',
            'options' => [
                'True',
                'False'
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 45400,
            'type' => 'multiple_choice',
            'question' => 'The food was good.',
            'options' => [
                'True',
                'False'
            ],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 74500,
            'type' => 'multiple_choice',
            'question' => 'He met someone nice.',
            'options' => [
                'True',
                'False'
            ],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 2.3,  'text' => 'Hello, Mr. Rashed.'],
        ['start' => 2.3,  'end' => 3.5,  'text' => 'Hi, how are you?'],
        ['start' => 3.5,  'end' => 6,  'text' => 'Fine, thank you. How was your vacation?'],
        ['start' => 6.5,  'end' => 8,  'text' => 'It was wonderful.'],
        ['start' => 9,  'end' => 12, 'text' => "I'm so happy to hear that. Was your flight okay?"],
        ['start' => 12.5, 'end' => 16.5, 'text' => 'No, pretty bad actually. It was so bumpy. It was very scary.'],
        ['start' => 16.5, 'end' => 19.3, 'text' => "That's too bad. Did you have nice weather?"],
        ['start' => 19.7, 'end' => 24.3, 'text' => 'No, the weather was terrible — very rainy. I actually never saw the sun.'],
        ['start' => 24.8, 'end' => 28, 'text' => "That's awful. So what did you do?"],
        ['start' => 28, 'end' => 30.3, 'text' => 'I stayed inside the hotel.'],
        ['start' => 30.5, 'end' => 31.5, 'text' => 'Was the hotel room nice?'],
        ['start' => 31.8, 'end' => 35, 'text' => "The room was fine, but it was right next to the café"],
        ['start' => 35.5, 'end' => 38, 'text' => "The music was very loud. I didn't sleep much."],
        ['start' => 39, 'end' => 40.5, 'text' => "I'll bet the food was great."],
        ['start' => 41, 'end' => 45, 'text' => 'No, it was too salty for me and the waiters were very unfriendly.'],
        ['start' => 45.7, 'end' => 47, 'text' => 'Did you go shopping at all?'],
        ['start' => 48, 'end' => 51, 'text' => 'A little bit, until someone stole my wallet.'],
        ['start' => 51.7, 'end' => 55, 'text' => 'After that I stayed in the hotel and read a book.'],
        ['start' => 56, 'end' => 58, 'text' => 'Was the flight home okay?'],
        ['start' => 58, 'end' => 60, 'text' => 'Actually, they cancelled my flight.'],
        ['start' => 60.7, 'end' => 66, 'text' => "That's terrible. But Mr. Rashed, you said that your vacation was wonderful."],
        ['start' => 66, 'end' => 68.5, 'text' => 'Ah yes, I did. And it was wonderful.'],
        ['start' => 68.7, 'end' => 74, 'text' => "I met a very nice person — a woman actually. Her name is Basar.  "],
        ['start' => 75.5, 'end' => 82, 'text' => "She's from Lebanon, just like me, but she lives here. I'm seeing her tonight. So yes, it was a wonderful vacation."],
        ['start' => 82, 'end' => 84, 'text' => "That's great, Mr. Rashed."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])