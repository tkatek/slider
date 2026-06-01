<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-6/video/comedy-encrypted/comedy.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-6/img/slide6.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 28000,
            'type' => 'multiple_choice',
            'question' => 'Why was Jeff in a hurry?',
            'options' => [
                'He was tired',
                'He was running late',
                'He was sick',
                'He was hungry',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 40700,
            'type' => 'multiple_choice',
            'question' => 'When I tried to get up, I slipped again and ________ through the shower door.',
            'options' => [
                'crashed',
                'jumped',
                'walked',
                'looked',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 50200,
            'type' => 'multiple_choice',
            'question' => 'What did he do when he cut his finger?',
            'options' => [
                'He called a doctor',
                'He went to sleep',
                'He put it under water',
                'He ignored it',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 59500,
            'type' => 'multiple_choice',
            'question' => 'I slipped and fell while I was ________ a shower.',
            'options' => [
                'taking',
                'having',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 6.5,  'text' => "Announcer: And now, here he is, the man you've been waiting for, comedian Jeff Noseworthy!"],
        ['start' => 12.7,  'end' => 19.5, 'text' => "Jeff Noseworthy: Boy oh boy, you won't believe what happened to me while I was getting ready to come to the comedy club."],
        ['start' => 20.5, 'end' => 22.5, 'text' => 'I was in a hurry because I was running late.'],
        ['start' => 22.5, 'end' => 27.5, 'text' => 'I jumped in the shower, right onto a bar of soap. I slipped and fell, and sprained my ankle.'],
        ['start' => 31, 'end' => 36.5, 'text' => 'When I tried to get up, I slipped again, and I crashed through the shower door.'],
        ['start' => 36.5, 'end' => 40.5, 'text' => 'Then, when I was picking up the pieces of glass, I cut my finger on one of the pieces.'],
        ['start' => 41.5, 'end' => 48.8, 'text' => 'So I ran to put the cut under running water, and the water was so hot, that it burned my skin.'],
        ['start' => 48.8, 'end' => 50, 'text' => 'Can you believe it?'],
        ['start' => 50.5, 'end' => 52.5, 'text' => 'Maybe I should take up skydiving.'],
        ['start' => 54.5, 'end' => 59, 'text' => 'Jumping out of an airplane sounds a lot safer to me than taking a shower.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])