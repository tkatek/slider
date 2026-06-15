<?php
$content = [
    'video'          => materialAsset('slider/A2/Intermediate/chapter-10/video/phone-problem-encrypted/phone-problem.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Intermediate/chapter-10/img/slide12.webp'),
    'isQuiz'         => 1,

    'questions' => [
        [
            'time' => 6200,
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
            'time' => 29800,
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
            'time' => 30400,
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
            'time' => 55500,
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
            'time' => 63500,
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
        ['start' => 0,    'end' => 2,    'text' => "Sophie: Hi Tom, what's up?"],
        ['start' => 2.2,  'end' => 6,    'text' => "Tom: Hi Sophie, just calling to say hi. I'm on the train. How's your day going?"],
        ['start' => 6.5,  'end' => 9,   'text' => 'Sophie: Oh, you know, OK I guess. And yours?'],
        ['start' => 10.3, 'end' => 19.5,   'text' => "Tom: Well, actually I've got some exciting news. You know my uncle, the one with the boat, he said that he was going to do one last trip to France before he sells it and he wants us to..."],
        ['start' => 20.5, 'end' => 24,   'text' => "Sophie: I can't hear you Tom. Are you going through a tunnel?"],
        ['start' => 24.7, 'end' => 29.5,   'text' => "Tom: No, I can't hear you either. The signal is very weak here. Hang on, I'll move somewhere else"],
        ['start' => 31, 'end' => 32,   'text' => "Is that better?"],
        ['start' => 32.7, 'end' => 35,   'text' => 'Sophie: Yeah, a bit. Go on.'],
        ['start' => 35.7, 'end' => 45,   'text' => "Tom: Well, my uncle with the boat says that he's going to do one last trip to France before he sells it and he wants us to..."],
        ['start' => 46.7, 'end' => 55,   'text' => "Sophie: Hang on, I still can't hear you properly. We keep getting cut off. Why don't we hang up and I'll try calling you back in a minute."],
        ['start' => 57, 'end' => 63,   'text' => "Tom: I can't hear you Sophie. I'm going to hang up and call back when I get off the train."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])