<?php
$content = [
    'video'          => materialAsset('slider/A2/Intermediate/chapter-10/video/encrypted/'),
    'thumbnail'      => materialAsset('slider/A2/Intermediate/chapter-10/img/slide12.webp'),
    'isQuiz'         => 1,

    'questions' => [
        [
            'time' => 8000,
            'type' => 'multiple_choice',
            'question' => 'Where is Tom when he calls Sophie?',
            'options' => [
                'At home',
                'On the train',
                'At work',
                'In a car',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => "Why can't Sophie hear Tom clearly?",
            'options' => [
                'He is speaking quietly',
                'The signal is very weak',
                'His phone is off',
                'She is busy',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => 'What does Tom do to fix the problem?',
            'options' => [
                'He hangs up immediately',
                'He sends a message',
                'He moves somewhere else',
                'He turns off his phone',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 56000,
            'type' => 'multiple_choice',
            'question' => 'What does Sophie suggest?',
            'options' => [
                'Send an email',
                'Wait for a long time',
                'Hang up and call again later',
                'Speak louder',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 72000,
            'type' => 'multiple_choice',
            'question' => 'What will Tom do at the end of the call?',
            'options' => [
                'Call his uncle',
                'Call Sophie back after the train ride',
                'Send a message',
                'Turn off his phone',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 3,    'text' => "Sophie: Hi Tom, what's up?"],
        ['start' => 3.5,  'end' => 9,    'text' => "Tom: Hi Sophie, just calling to say hi. I'm on the train. How's your day going?"],
        ['start' => 9.5,  'end' => 13,   'text' => 'Sophie: Oh, you know, OK I guess. And yours?'],
        ['start' => 13.5, 'end' => 23,   'text' => "Tom: Well, actually I've got some exciting news. You know my uncle, the one with the boat, he said that he was going to do one last trip to France before he sells it and he wants us to..."],
        ['start' => 23.5, 'end' => 28,   'text' => "Sophie: I can't hear you Tom. Are you going through a tunnel?"],
        ['start' => 28.5, 'end' => 38,   'text' => "Tom: No, I can't hear you either. The signal is very weak here. Hang on, I'll move somewhere else. Is that better?"],
        ['start' => 38.5, 'end' => 41,   'text' => 'Sophie: Yeah, a bit. Go on.'],
        ['start' => 41.5, 'end' => 51,   'text' => "Tom: Well, my uncle with the boat says that he's going to do one last trip to France before he sells it and he wants us to..."],
        ['start' => 51.5, 'end' => 61,   'text' => "Sophie: Hang on, I still can't hear you properly. We keep getting cut off. Why don't we hang up and I'll try calling you back in a minute."],
        ['start' => 61.5, 'end' => 70,   'text' => "Tom: I can't hear you Sophie. I'm going to hang up and call back when I get off the train."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
