<?php
$content = [
    'video'     => materialAsset('slider/A1/Beginner/chapter-7/video/encrypted/where-is.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Beginner/chapter-7/img/video-thumbnail.webp'),

    'isQuiz' => 1,

    'questions' => [
        [
            'time' => 26000,
            'type' => 'multiple_choice',
            'question' => 'Choose the correct direction: Go straight. Go past the school and ___ left.',
            'options' => ['turn', 'go', 'next'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 43000,
            'type' => 'multiple_choice',
            'question' => 'Where is the train station?',
            'options' => ['Next to the pub', 'Opposite the park', 'Next to the hotel'],
            'correct_answer' => 0,
            'points' => 10
        ],

        [
            'time' => 83000,
            'type' => 'multiple_choice',
            'question' => 'Where is the supermarket?',
            'options' => ['Next to the park', 'Opposite the park', 'Next to the school'],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 2, 'text' => 'Hi Emma. Hi.'],
        ['start' => 2, 'end' => 3, 'text' => 'Where are you?'],
        ['start' => 3, 'end' => 7, 'text' => "I'm in Oxford. I'm from Oxford."],
        ['start' => 7, 'end' => 10, 'text' => "I know, but I'm lost. Where is the train station?"],

        ['start' => 10, 'end' => 13, 'text' => 'Go straight. Go straight.'],
        ['start' => 16, 'end' => 20, 'text' => 'Go past the school. Go past the school'],
        ['start' => 22, 'end' => 26, 'text' => 'And turn left. Turn left.'],
        ['start' => 27, 'end' => 32, 'text' => 'Oh, no, no, no. Sorry. Turn right. Turn right. '],
        ['start' => 33, 'end' => 38, 'text' => "It's next to the pub. Next to the pub. oh I see it now. "],
        ['start' => 38, 'end' => 39, 'text' => 'Thank you so much.'],
        ['start' => 40, 'end' => 42, 'text' => "You're welcome."],

        ['start' => 47, 'end' => 48, 'text' => 'Hey, mack. Hello.'],
        ['start' => 48, 'end' => 50, 'text' => 'Where are you?'],
        ['start' => 50, 'end' => 53, 'text' => "I'm in Pworth, but I'm lost. Where is the supermarket?"],

        ['start' => 53, 'end' => 56, 'text' => 'Go straight. Go straight.'],
        ['start' => 57, 'end' => 61, 'text' => 'Turn right. Turn right.'],
        ['start' => 64, 'end' => 69, 'text' => 'Go past the school. Go past the school.'],
        ['start' => 70, 'end' => 74, 'text' => "It's next to the park. It's next to the park."],
        ['start' => 74, 'end' => 79, 'text' => "Oh, no. Sorry. It's opposite the park. It's opposite the park."],
        ['start' => 79, 'end' => 83, 'text' => "Aha. Thank you. You're welcome."],
    ],
];

?>
@include("slider.video.interactive", ['content' => $content])