<?php
$content = [
    'title'    => 'Practice 7',
    'subtitle' => 'Drag & drop each sentence into the correct category',

    'categories' => [
        'Very sure' => [
            'emoji' => '✅',
            'items' => [
                "There's no chance that we'll ever win the lottery.",
                "He's bound to feel nervous before his driving test.",
                "There's no way that my boss will give me the day off.",
                "She's certain to get that job!",
                "He's certain that he'll get here on time.",
            ],
        ],

        'Sure' => [
            'emoji' => '👍',
            'items' => [
                "I'm sure that you'll do well in the interview.",
                "Are you sure that you won't be available?",
                "Donna will really enjoy this film.",
                "You won't regret it.",
            ],
        ],

        'Almost sure' => [
            'emoji' => '🤔',
            'items' => [
                "We'll probably finish the project by tomorrow.",
                "There's a good chance that it'll snow this week.",
                "Ali's unlikely to be invited to the party.",
                "He probably won't have enough time.",
                "The government's likely to call an election soon.",
            ],
        ],

        'Not sure' => [
            'emoji' => '❓',
            'items' => [
                "I'm not sure that I'll be able to finish this pizza!",
                "There's a chance that he might come and visit us next week.",
                "I think we might see more of these problems in the next few years.",
                "He hasn't studied much, so he might not pass the exam.",
                "I might go to the party, but I'm not sure yet.",
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])