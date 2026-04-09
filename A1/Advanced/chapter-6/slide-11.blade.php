<?php
$content = [
    'type' => 'emoji',
    'title' => 'Practice 3',
    'subtitle' => '',

    'questions' => [
        [
            'emoji'   => '👀👉',
            'prompt'  => '1. Which phrase is used for pointing out something you see?',
            'correct' => "Look, there's…",
            'options' => ['Here you go.', "Look, there's…", "I'm so excited.", "You can… if you'd like."]
        ],
        [
            'emoji'   => '💡🗣️',
            'prompt'  => '2. Which function matches the phrase Let’s… / We can…?',
            'correct' => 'Suggesting',
            'options' => ['Suggesting', 'Confirming', 'Offering', 'Expressing excitement']
        ],
        [
            'emoji'   => '🙏❓',
            'prompt'  => '3. Which phrase fits a polite request?',
            'correct' => 'Excuse me… Is this the right…?',
            'options' => ['Excuse me… Is this the right…?', "That's a good idea.", "I'm so excited.", "Look, there's…"]
        ],
        [
            'emoji'   => '🎁🤝',
            'prompt'  => '4. Which function is used when giving someone options, like Wi-Fi or help?',
            'correct' => 'Offering',
            'options' => ['Offering', 'Suggesting', 'Confirming', 'Agreeing & closing']
        ],
        [
            'emoji'   => '🤩✨',
            'prompt'  => '5. Which phrase belongs to expressing excitement?',
            'correct' => "I'm so excited. / Brilliant.",
            'options' => ["I'm so excited. / Brilliant.", 'Here you go.', 'Excuse me… Is this the right…?', "Yes, that's correct."]
        ],
        [
            'emoji'   => '👍🚆',
            'prompt'  => '6. Which function matches That’s a good idea. / Enjoy your…?',
            'correct' => 'Agreeing & closing',
            'options' => ['Agreeing & closing', 'Pointing out', 'Offering', 'Polite request']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])