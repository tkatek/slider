<?php
$content = [
    'title' => 'Practice 7',
    'subtitle' => 'Choose the correct answer',

    'questions' => [
        [
            'prefix' => 'I need to call',
            'suffix' => 'my mom later. She called while I was busy.',
            'hint' => 'out / back / on / up',
            'answers' => ['back'],
        ],
        [
            'prefix' => "Please don't hang",
            'suffix' => 'yet! I have one more question.',
            'hint' => 'up / out / down / on',
            'answers' => ['up'],
        ],
        [
            'prefix' => 'Sorry to interrupt. Please go',
            'suffix' => 'with your story.',
            'hint' => 'up / on / out / off',
            'answers' => ['on'],
        ],
        [
            'prefix' => 'The phone line was cut',
            'suffix' => 'during our conversation.',
            'hint' => 'up / off / on / out',
            'answers' => ['off'],
        ],
        [
            'prefix' => 'The connection is',
            'suffix' => "weak. I can't hear you.",
            'hint' => 'to / too / very',
            'answers' => ['too', 'very'],
        ],
    ],
];
?>

@include('slider.game.type-correct-format', ['content' => $content])
