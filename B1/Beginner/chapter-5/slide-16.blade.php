<?php
$content = [
    'title'    => 'Practice 6',
    'subtitle' => 'Listen again & answer the questions',
    'type' => 'questions_only',
    'audio' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide16.mp3'),

    'script' => [
        'Todd: Trevor, do you like the beach?',
        'Trevor: I love the beach. The beach is great.',
        'Todd: OK. Why do you love the beach?',
        "Trevor: It's nice fresh air, beautiful water, you can play in the sand, and my hobby is surfing, so I like to go surfing.",
        'Todd: Oh..nice. How often do you go surfing?',
        'Trevor: I try to go as often as possible, usually every weekend.',
        'Todd: OK. When do you go to the beach? Saturday? Sunday?',
        'Trevor: Usually early on a Saturday morning. Try to beat the crowds.',
        'Todd: OK. What do you do at the beach besides surfing?',
        'Trevor: Oh, just relax on the sand, watch the people, maybe have a swim, throw a frisbee.',
        'Todd: OK.',
        'Trevor: Things like that!',
        'Todd: How long have you been surfing?',
        'Trevor: Since I was ten years old.',
        "Todd: Wow, since you were ten. That's great! -- What do you take to the beach, when you go?",
        'Trevor: A towel, and my hat, my sunscreen, my surfboard, wetsuit, some food and water, and maybe a radio.',
        'Todd: OK. Now, you are from Australia. How are the beaches different in Australia than Japan?',
        'Trevor: The beaches are much bigger and white sand, clean water, very nice.',
        'Todd: OK. Well, sounds good. Thanks a lot Trevor.',
        'Trevor: OK. Catch you later.',
    ],

    'questions' => [
        [
            'prompt'  => 'What is his hobby?',
            'correct' => 'Surfing',
            'options' => ['Fishing', 'Volleyball', 'Surfing'],
        ],
        [
            'prompt'  => 'When does he go to the beach?',
            'correct' => 'The weekend',
            'options' => ['Every day', 'The weekend', 'National holidays'],
        ],
        [
            'prompt'  => 'What things does he do at the beach?',
            'correct' => 'Play frisbee',
            'options' => ['Barbeque', 'Play frisbee', 'Read a book'],
        ],
        [
            'prompt'  => 'When did he start surfing?',
            'correct' => 'Age 10',
            'options' => ['Age 9', 'Age 10', 'Age 14'],
        ],
        [
            'prompt'  => 'How are the beaches different in Australia?',
            'correct' => 'Both',
            'options' => ['They are bigger', 'They have white sand', 'Both'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])