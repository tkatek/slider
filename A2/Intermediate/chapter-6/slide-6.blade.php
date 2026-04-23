<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-5/videos/'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-5/videos/slide5.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 19000,
            'type' => 'multiple_choice',
            'question' => 'I slipped and fell while I was ________ a shower.',
            'options' => [
                'taking',
                'having',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 30000,
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
            'time' => 12000,
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
            'time' => 47000,
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
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => "Announcer: And now, here he is, the man you've been waiting for, comedian Jeff Noseworthy!"],
        ['start' => 4,  'end' => 10, 'text' => "Jeff Noseworthy: Boy oh boy, you won't believe what happened to me while I was getting ready to come to the comedy club."],
        ['start' => 10, 'end' => 15, 'text' => 'I was in a hurry because I was running late.'],
        ['start' => 15, 'end' => 22, 'text' => 'I jumped in the shower, right onto a bar of soap. I slipped and fell, and sprained my ankle.'],
        ['start' => 22, 'end' => 29, 'text' => 'When I tried to get up, I slipped again, and I crashed through the shower door.'],
        ['start' => 29, 'end' => 37, 'text' => 'Then, when I was picking up the pieces of glass, I cut my finger on one of the pieces.'],
        ['start' => 37, 'end' => 46, 'text' => 'So I ran to put the cut under running water, and the water was so hot, that it burned my skin.'],
        ['start' => 46, 'end' => 56, 'text' => 'Can you believe it? Maybe I should take up skydiving.'],
        ['start' => 56, 'end' => 64, 'text' => 'Jumping out of an airplane sounds a lot safer to me than taking a shower.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])
