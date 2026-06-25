<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Beginner/chapter-11/img/slide6.webp'),
    'isQuiz'   => 0,

    'questions' => [
        [
            'prompt'  => '1. If Anne . . . . . . . to sleep so late, she would have woken up on time.',
            'correct' => "hadn't gone",
            'options' => [
                "didn't go",
                "hadn't gone",
                "wouldn't go",
                "hasn't gone",
            ],
        ],
        [
            'prompt'  => '2. If Anne had started studying earlier, she . . . . . . . at the library for so long.',
            'correct' => "wouldn't have stayed",
            'options' => [
                "wouldn't stay",
                "hadn't stayed",
                "wouldn't have stayed",
                "won't stay",
            ],
        ],
        [
            'prompt'  => "3. If it hadn't rained, there . . . . . . . less traffic.",
            'correct' => 'would have been',
            'options' => [
                'would be',
                'had been',
                'would have been',
                'will be',
            ],
        ],
        [
            'prompt'  => 'Complete the sentence: If Anne . . . . . . . to sleep so late, she would have woken up on time.',
            'correct' => "hadn't gone",
            'options' => [
                "hadn't gone",
            ],
        ],
        [
            'prompt'  => 'Complete the sentence: If Anne had started studying earlier, she . . . . . . . at the library for so long.',
            'correct' => "wouldn't have stayed",
            'options' => [
                "wouldn't have stayed",
            ],
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 3,    'text' => "Friend: Hi, Anne. What's wrong?"],
        ['start' => 3.5,  'end' => 6,    'text' => 'Anne: I was really late for work today.'],
        ['start' => 6.5,  'end' => 8.5,  'text' => 'Friend: What happened?'],
        ['start' => 9,    'end' => 16,   'text' => "Anne: First, I woke up really late. If I hadn't gone to sleep so late, I would have woken up on time."],
        ['start' => 16.5, 'end' => 19,   'text' => 'Friend: Why did you go to sleep late?'],
        ['start' => 19.5, 'end' => 27,   'text' => "Anne: I was studying for an exam. If I had started studying earlier, I wouldn't have stayed at the library for so long."],
        ['start' => 27.5, 'end' => 30,   'text' => 'Friend: What time did you get to work?'],
        ['start' => 30.5, 'end' => 35,   'text' => 'Anne: I got here at 10:00. It also took me a long time to drive here.'],
        ['start' => 35.5, 'end' => 38,   'text' => 'Friend: Why was the drive so slow?'],
        ['start' => 38.5, 'end' => 45,   'text' => "Anne: Because it was raining. If it hadn't rained, there would have been less traffic."],
        ['start' => 45.5, 'end' => 48,   'text' => 'Friend: That sounds like a difficult morning!'],
        ['start' => 48.5, 'end' => 52,   'text' => 'Anne: It was! I wish things had gone differently.'],

        ['start' => 52.5, 'end' => 56,   'text' => 'Friend: So, what can we learn from this?'],
        ['start' => 56.5, 'end' => 62,   'text' => 'Anne: We use the Third Conditional to talk about unreal past situations and their results.'],
        ['start' => 62.5, 'end' => 66,   'text' => 'Friend: Can you give me some examples?'],
        ['start' => 66.5, 'end' => 68,   'text' => 'Anne: Sure.'],
        ['start' => 68.5, 'end' => 74,   'text' => "If I hadn't gone to sleep so late, I would have woken up on time."],
        ['start' => 74.5, 'end' => 81,   'text' => "If I had started studying earlier, I wouldn't have stayed at the library so long."],
        ['start' => 81.5, 'end' => 87,   'text' => "If it hadn't rained, there would have been less traffic."],
        ['start' => 87.5, 'end' => 94,   'text' => 'Friend: So we use it to talk about regrets or things we wish had happened differently?'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])