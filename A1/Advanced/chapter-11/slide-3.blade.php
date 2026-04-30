<?php
$content = [
    'video'     => materialAsset('slider/A1/Advanced/chapter-11/video/conversations-encrypted/conversations.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Beginner/chapter11/img/conversations.webp'),

    'isQuiz' => 1,

    // Quiz timing adjusted to appear AFTER the answer is mentioned
    // and during silent moments between subtitles.
    'questions' => [
        [
            // After: "Tom is in the library; he's reading a book..."
            // Subtitle ends at 26s, next subtitle starts at 27.5s
            'time' => 26500,
            'type' => 'multiple_choice',
            'question' => 'Tom is studying at home.',
            'options' => ['true', 'false'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            // After: "Maya is at the gym; she is working out."
            // Subtitle ends at 34.5s, next subtitle starts at 38.5s
            'time' => 35500,
            'type' => 'multiple_choice',
            'question' => 'Maya is __________ at the gym.',
            'options' => ['watching TV', 'reading a book', 'working out'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            // After: "I am watching a movie on Netflix."
            // Subtitle ends at 64s, next subtitle starts at 66.7s
            'time' => 65000,
            'type' => 'multiple_choice',
            'question' => 'Lisa is watching a movie on Netflix.',
            'options' => ['true', 'false'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            // After: "Do you want to go shopping together?"
            // Subtitle ends at 85s, next subtitle starts at 85.8s
            'time' => 85200,
            'type' => 'multiple_choice',
            'question' => 'Lisa is going __________ with Sarah.',
            'options' => ['fishing', 'shopping', 'jogging'],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 2, 'text' => 'Conversation 1'],
        ['start' => 4.5, 'end' => 6, 'text' => 'Hey, what are you doing?'],
        ['start' => 6.7, 'end' => 8.5, 'text' => 'I am watching TV.'],
        ['start' => 10.8, 'end' => 12.5, 'text' => 'Are you enjoying the show?'],
        ['start' => 12.5, 'end' => 15, 'text' => 'Yes I am, it is very entertaining.'],
        ['start' => 16.5, 'end' => 20.5, 'text' => 'That\'s great. By the way, do you know where Tom is and what he is doing?'],
        ['start' => 22, 'end' => 26, 'text' => 'Tom is in the library; he\'s reading a book for his computer class.'],
        ['start' => 27.5, 'end' => 32, 'text' => 'Thanks. And how about Maya? Do you know where she is and what she\'s doing?'],
        ['start' => 32, 'end' => 34.5, 'text' => 'Maya is at the gym; she is working out.'],
        ['start' => 38.5, 'end' => 40, 'text' => 'Thanks for letting me know.'],
        ['start' => 41, 'end' => 42, 'text' => 'You\'re welcome.'],

        ['start' => 44.5, 'end' => 46.5, 'text' => 'Conversation 2'],
        ['start' => 48.7, 'end' => 50, 'text' => 'Hi, is this Lisa?'],
        ['start' => 50.5, 'end' => 53, 'text' => 'Yes it is, who is calling?'],
        ['start' => 55, 'end' => 58, 'text' => 'Hey Lisa, it\'s Sarah. What are you doing?'],
        ['start' => 60.5, 'end' => 64, 'text' => 'Hi Sarah, I am watching a movie on Netflix.'],
        ['start' => 66.7, 'end' => 69, 'text' => 'Nice, what movie are you watching?'],
        ['start' => 69, 'end' => 71, 'text' => 'I\'m watching The Avengers.'],
        ['start' => 72.5, 'end' => 74.5, 'text' => 'Cool, I love that movie.'],
        ['start' => 74.5, 'end' => 77.5, 'text' => 'What about you? What are you doing?'],
        ['start' => 79.5, 'end' => 81.5, 'text' => 'I\'m enjoying a cup of coffee and reading a book.'],
        ['start' => 81.7, 'end' => 85, 'text' => 'Sounds relaxing. Hey, do you want to go shopping together?'],
        ['start' => 85.8, 'end' => 86.8, 'text' => 'Yes, sure.'],
        ['start' => 87, 'end' => 90, 'text' => 'Let\'s meet at the entrance of the shopping mall later.'],
        ['start' => 90, 'end' => 91, 'text' => 'Great, see you later.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])