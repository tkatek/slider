<?php
$content = [
    'title' => 'Warm Up',
    'type' => 'audio',
    'subtitle' => 'Choose True or False',
    'audio' => materialAsset('slider/A1/Advanced/chapter-5/audios/slide7.mp3'),
    'status_row_width' => 'max-w-4xl',
    'game_card_width' => 'max-w-4xl',

    'script' => [
        'Daniel: Excuse me, is this seat taken?',
        "Emma: No, it's free. Please, have a seat.",
        "Daniel: Thank you. It's quite crowded today.",
        "Emma: Yes, it is. I think there's a festival in town.",
        'Daniel: That explains it. Are you heading there?',
        "Emma: No, I'm going to work. How about you?",
        "Daniel: I'm on my way to the library.",
        'Emma: Oh, are you a student?',
        'Daniel: Yes, I study history. What about you?',
        'Emma: I work at the art gallery downtown.',
        "Daniel: That's interesting! I love art.",
        'Emma: Come and visit us sometime.',
        'Daniel: I like that idea. Do you have any special exhibitions?',
        "Emma: Yes, we're showing local artists this month.",
        'Daniel: That sounds great.',
        'Emma: Wonderful! Let me know when you come.',
        'Daniel: Sure. Maybe I visit after my classes.',
        "Emma: Perfect. We're open until 6 p.m.",
        "Daniel: Good to know. By the way, I'm Daniel.",
        "Emma: Nice to meet you, Daniel. I'm Emma.",
        'Daniel: Nice to meet you too.',
        'Emma: This is my stop coming up.',
        'Daniel: Oh, alright. Have a good day at work.',
        'Emma: Thanks! Enjoy your time at the library.',
        'Daniel: Thank you. See you around.',
        'Emma: Bye!',
    ],

    'questions' => [
        [
            'prompt' => 'Daniel and Emma are sitting on a train.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt' => 'Emma is going to the festival in town.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt' => 'Daniel studies history at university.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt' => 'The art gallery is showing international artists this month.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt' => 'The art gallery closes at 7 p.m.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt' => 'Daniel plans to visit the art gallery after his classes.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])