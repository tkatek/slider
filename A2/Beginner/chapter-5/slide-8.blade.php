<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-5/videos/'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-5/img/slide6.webp'),
    'isQuiz'     => 1,

    'questions' => [
        [
            'time' => 18000,
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
            'time' => 27000,
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
            'time' => 43000,
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
            'time' => 51000,
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
            'time' => 90000,
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
        ['start' => 0,  'end' => 3,  'text' => 'Hello, Mr. Rashed. Hi, how are you?'],
        ['start' => 3,  'end' => 6,  'text' => 'Fine, thank you. How was your vacation?'],
        ['start' => 6,  'end' => 8,  'text' => 'It was wonderful.'],
        ['start' => 8,  'end' => 12, 'text' => "I'm so happy to hear that. Was your flight okay?"],
        ['start' => 12, 'end' => 18, 'text' => 'No, pretty bad actually. It was so bumpy. It was very scary.'],
        ['start' => 18, 'end' => 22, 'text' => "That's too bad. Did you have nice weather after you arrived?"],
        ['start' => 22, 'end' => 27, 'text' => 'No, the weather was terrible — very rainy. I actually never saw the sun.'],
        ['start' => 27, 'end' => 30, 'text' => "That's awful. So what did you do?"],
        ['start' => 30, 'end' => 33, 'text' => 'I stayed inside the hotel.'],
        ['start' => 33, 'end' => 36, 'text' => 'Was the hotel room nice?'],
        ['start' => 36, 'end' => 43, 'text' => "The room was fine, but it was right next to the café and the music was very loud. I didn't sleep much."],
        ['start' => 43, 'end' => 46, 'text' => "I'll bet the food was great."],
        ['start' => 46, 'end' => 51, 'text' => 'No, it was too salty for me and the waiters were very unfriendly.'],
        ['start' => 51, 'end' => 54, 'text' => 'Did you go shopping at all?'],
        ['start' => 54, 'end' => 61, 'text' => 'A little bit, until someone stole my wallet. After that I stayed in the hotel and read a book.'],
        ['start' => 61, 'end' => 64, 'text' => 'Was the flight home okay?'],
        ['start' => 64, 'end' => 69, 'text' => 'Actually, they cancelled my flight. I had to stay for two more days.'],
        ['start' => 69, 'end' => 74, 'text' => "That's terrible. But Mr. Rashed, you said that your vacation was wonderful."],
        ['start' => 74, 'end' => 78, 'text' => 'Ah yes, I did. And it was wonderful.'],
        ['start' => 78, 'end' => 90, 'text' => "I met a very nice person — a woman actually. Her name is Basar. She's from Lebanon, just like me, but she lives here. I'm seeing her tonight. So yes, it was a wonderful vacation."],
        ['start' => 90, 'end' => 93, 'text' => "That's great, Mr. Rashed."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])