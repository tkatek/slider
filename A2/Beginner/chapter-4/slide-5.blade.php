<?php
$content = [
    'title'          => "Let's Watch This Video",
    'video'          => materialAsset('slider/A2/Beginner/chapter-4/'),
    'thumbnail'      => materialAsset('slider/A2/Beginner/chapter-4/img/slide5.webp'),
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions' => [
        [
            'time' => 23000,
            'type' => 'multiple_choice',
            'question' => '1- What did Pete buy?',
            'options' => ['Food', 'New clothes', 'Shoes', 'A book'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 36000,
            'type' => 'multiple_choice',
            'question' => '2- Who did Pete play tennis with?',
            'options' => ['John', 'His sister', 'Tom', 'Alone'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 83000,
            'type' => 'multiple_choice',
            'question' => '3- What flavour of ice cream did Ahmed have?',
            'options' => ['Vanilla', 'Strawberry', 'Chocolate', 'Mango'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 90000,
            'type' => 'multiple_choice',
            'question' => '4- Ahmed went to the park alone.',
            'options' => ['True', 'False'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 111000,
            'type' => 'multiple_choice',
            'question' => '5- The movie was about space travel.',
            'options' => ['True', 'False'],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 11,  'end' => 15,  'text' => 'Anna: What did you do yesterday?'],
        ['start' => 15,  'end' => 20,  'text' => 'Pete: I did many things. I went shopping.'],
        ['start' => 20,  'end' => 23,  'text' => 'Anna: What did you buy?'],
        ['start' => 23,  'end' => 27,  'text' => 'Pete: I bought new clothes.'],
        ['start' => 27,  'end' => 31,  'text' => 'Anna: What else did you do?'],
        ['start' => 31,  'end' => 32,  'text' => 'Pete: I also played tennis.'],
        ['start' => 32,  'end' => 36,  'text' => 'Anna: Who did you play with?'],
        ['start' => 36,  'end' => 39,  'text' => 'Pete: I played with Tom.'],
        ['start' => 39,  'end' => 42,  'text' => 'Anna: Did you win?'],
        ['start' => 42,  'end' => 54,  'text' => 'Pete: Yes, I won!'],
        ['start' => 54,  'end' => 57,  'text' => 'Suzy: What did you do yesterday?'],
        ['start' => 57,  'end' => 64,  'text' => 'Ahmed: I went to the park. It was a sunny day.'],
        ['start' => 64,  'end' => 67,  'text' => 'Suzy: That sounds nice. Did you go alone?'],
        ['start' => 67,  'end' => 77,  'text' => 'Ahmed: No, I went there with John. We had ice cream.'],
        ['start' => 77,  'end' => 83,  'text' => 'Suzy: Ice cream is my favorite. Which flavor did you have?'],
        ['start' => 83,  'end' => 99,  'text' => 'Ahmed: I had chocolate. John had vanilla. Yummy!'],
        ['start' => 99,  'end' => 102, 'text' => 'Rana: Did you watch the movie last night?'],
        ['start' => 102, 'end' => 108, 'text' => 'Mohamed: Yes, I did. It was amazing!'],
        ['start' => 108, 'end' => 111, 'text' => 'Rana: Really? What was it about?'],
        ['start' => 111, 'end' => 117, 'text' => 'Mohamed: It was a movie about space travel.'],
        ['start' => 117, 'end' => 123, 'text' => 'Rana: That sounds interesting. Who did you watch it with?'],
        ['start' => 123, 'end' => 130, 'text' => 'Mohamed: I watched it with my sister. She loved it.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
