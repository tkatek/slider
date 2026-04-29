<?php
$content = [
    'type'       => 'audio',
    'page_title' => 'Listening',
    'title'      => 'Listening: Keeping fit!',
    'subtitle'   => "People are talking about New Year's resolutions. What is each person going to do? Listen and choose the correct answer.",

    'audio' => materialAsset('slider/A2/Beginner/chapter-10/audios/slide8/listen.mpeg'),

    'script' => [
        '1.',
        "A: What's your New Year's resolution, Lee?",
        "B: I'm really going to get in shape this year. I'm going to exercise every day and lose five kilos. You watch.",
        '',
        '2.',
        "A: Have you made any New Year's resolutions?",
        'B: Sure. I am going to give up smoking.',
        "A: Why don't you enroll in a program that helps people stop smoking?",
        'B: That sounds like a great idea.',
        '',
        '3.',
        'A: I need to get more exercise.',
        'B: You should do more walking. Maybe you could walk to the subway every day instead of taking the bus.',
        'A: Yeah, I think I will.',
        'B: And why not take up jogging?',
        "A: Let's not push it. I can't stand jogging.",
        '',
        '4.',
        'A: What are you going to do for the New Year?',
        'B: Well, everyone tells me I look too thin. I need to put on a couple of kilos.',
        "A: Why don't you join a gym and lift weights?",
    ],

    'questions' => [
        [
            'prompt'  => 'Choose the correct answer.',
            'correct' => 'a. do more exercise',
            'options' => [
                'a. do more exercise',
                'b. put on weight',
            ],
        ],
        [
            'prompt'  => 'Choose the correct answer.',
            'correct' => 'b. give up smoking',
            'options' => [
                'a. learn to swim',
                'b. give up smoking',
            ],
        ],
        [
            'prompt'  => 'Choose the correct answer.',
            'correct' => 'a. do more walking',
            'options' => [
                'a. do more walking',
                'b. take up jogging',
            ],
        ],
        [
            'prompt'  => 'Choose the correct answer.',
            'correct' => 'b. put on weight',
            'options' => [
                'a. join a gym',
                'b. put on weight',
            ],
        ],
        [
            'prompt'  => 'Choose the correct answer.',
            'correct' => 'b. lose some weight',
            'options' => [
                'a. eat less meat',
                'b. lose some weight',
            ],
        ],
        [
            'prompt'  => 'Choose the correct answer.',
            'correct' => 'b. start doing sit-ups',
            'options' => [
                'a. take up jogging',
                'b. start doing sit-ups',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])