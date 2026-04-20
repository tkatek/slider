<?php
$content = [
    'video'     => materialAsset('slider/A1/Beginner/chapter-7/video/encrypted/conversation.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-7/img/video-thumbnail.webp'),

    'isQuiz' => 1,

    'questions' => [
        [
            'time' => 45000,
            'type' => 'multiple_choice',
            'question' => 'Tom is studying at home.',
            'options' => ['true', 'false'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 90000,
            'type' => 'multiple_choice',
            'question' => 'Lisa is watching a movie on Netflix.',
            'options' => ['true', 'false'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 65000,
            'type' => 'multiple_choice',
            'question' => 'Maya is __________ at the gym.',
            'options' => ['watching TV', 'reading a book', 'working out'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 125000,
            'type' => 'multiple_choice',
            'question' => 'Lisa is going __________ with Sarah.',
            'options' => ['fishing', 'shopping', 'jogging'],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 4, 'text' => 'Alex: Hey, what are you doing?'],
        ['start' => 4, 'end' => 8, 'text' => 'Other: I am watching TV.'],
        ['start' => 8, 'end' => 12, 'text' => 'Alex: Are you enjoying the show?'],
        ['start' => 12, 'end' => 17, 'text' => 'Other: Yes I am, it is very entertaining.'],
        ['start' => 17, 'end' => 24, 'text' => 'Alex: That\'s great. By the way, do you know where Tom is and what he is doing?'],
        ['start' => 24, 'end' => 32, 'text' => 'Other: Tom is in the library; he\'s reading a book for his computer class.'],
        ['start' => 32, 'end' => 39, 'text' => 'Alex: Thanks. And how about Maya? Do you know where she is and what she\'s doing?'],
        ['start' => 39, 'end' => 45, 'text' => 'Other: Maya is at the gym; she is working out.'],
        ['start' => 45, 'end' => 49, 'text' => 'Alex: Thanks for letting me know.'],
        ['start' => 49, 'end' => 52, 'text' => 'Other: You\'re welcome.'],

        ['start' => 75, 'end' => 79, 'text' => 'Sarah: Hi, is this Lisa?'],
        ['start' => 79, 'end' => 83, 'text' => 'Lisa: Yes it is, who is calling?'],
        ['start' => 83, 'end' => 87, 'text' => 'Sarah: Hey Lisa, it\'s Sarah. What are you doing?'],
        ['start' => 87, 'end' => 92, 'text' => 'Lisa: Hi Sarah, I am watching a movie on Netflix.'],
        ['start' => 92, 'end' => 96, 'text' => 'Sarah: Nice, what movie are you watching?'],
        ['start' => 96, 'end' => 100, 'text' => 'Lisa: I\'m watching The Avengers.'],
        ['start' => 100, 'end' => 105, 'text' => 'Sarah: Cool, I love that movie. What about you? What are you doing?'],
        ['start' => 105, 'end' => 111, 'text' => 'Lisa: I\'m enjoying a cup of coffee and reading a book.'],
        ['start' => 111, 'end' => 114, 'text' => 'Sarah: Sounds relaxing.'],
        ['start' => 114, 'end' => 120, 'text' => 'Sarah: Hey, do you want to go shopping together?'],
        ['start' => 120, 'end' => 124, 'text' => 'Lisa: Yes, sure. Let\'s meet at the entrance of the shopping mall later.'],
        ['start' => 124, 'end' => 128, 'text' => 'Sarah: Great, see you later.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])