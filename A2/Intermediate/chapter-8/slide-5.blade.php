<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-8/video/up-too-encrypted/up-too.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-8/img/slide4.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 8000,
            'type' => 'multiple_choice',
            'question' => 'What will the speaker do if the weather is nice?',
            'options' => [
                'Stay at home',
                'Go shopping',
                'Hang out at the park',
                'Visit family',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 15000,
            'type' => 'multiple_choice',
            'question' => 'What might they do if the sun comes out?',
            'options' => [
                'Go to the cinema',
                'Check out a new café',
                'Play sports',
                'Travel',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 20400,
            'type' => 'multiple_choice',
            'question' => 'What will happen if the speaker runs into Jake?',
            'options' => [
                'He will go home',
                'He will invite Jake to join them',
                'He will ignore him',
                'He will cancel the plan',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 31000,
            'type' => 'multiple_choice',
            'question' => 'What will the speaker do if it rains?',
            'options' => [
                'Go to the park',
                'Meet friends',
                'Stay in and watch a series',
                'Go to a café',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 42500,
            'type' => 'multiple_choice',
            'question' => 'What is the final plan if the friend calls on Saturday morning?',
            'options' => [
                'They will go out',
                'They will study together',
                'He will come over',
                'They will cancel everything',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 2.5,  'text' => 'Ahmed: Hey, what are you up to this weekend?'],
        ['start' => 3,  'end' => 7, 'text' => "Nader: Not sure yet. If the weather is nice, I'll hang out at the park."],
        ['start' => 10, 'end' => 14, 'text' => 'Ahmed: Sounds good. If the sun comes out, we will check out that new cafe.'],
        ['start' => 16.3, 'end' => 20, 'text' => 'Nader: Yeah, and if I run into Jake, I might bring him along.'],
        ['start' => 20.8, 'end' => 25, 'text' => 'Ahmed: Cool. If we hang out together, we can catch up on all the news.'],
        ['start' => 26.8, 'end' => 30, 'text' => "Nader: But if it rains, I'll stay in and binge-watch a series."],
        ['start' => 31.8, 'end' => 37, 'text' => "Ahmed: Same here. If the rain doesn't let up, we should order pizza and chill at my place."],
        ['start' => 38.5, 'end' => 42, 'text' => "Nader: Deal. If you call me on Saturday morning, I'll come over."],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])