<?php

$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Intermediate/chapter-12/img/slide5.webp'),
    'isQuiz'   => 0,

    'questions' => [
        [
            'time' => 24000,
            'type' => 'multiple_choice',
            'question' => 'What does being open-minded mean?',
            'options' => [
                'Refusing to change your opinion',
                'Being willing to consider new ideas and perspectives',
                'Agreeing with everyone',
                'Ignoring other people',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 48000,
            'type' => 'multiple_choice',
            'question' => 'According to the text, open-mindedness helps us:',
            'options' => [
                'Avoid meeting new people',
                'Learn new things from others',
                'Win every argument',
                'Think exactly like everyone else',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 78000,
            'type' => 'multiple_choice',
            'question' => 'Which example is open-minded?',
            'options' => [
                'That food looks gross.',
                'Everyone should celebrate the same way.',
                'I would love to learn more about that.',
                'Your traditions are strange.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 102000,
            'type' => 'multiple_choice',
            'question' => 'Why do people feel safe around open-minded individuals?',
            'options' => [
                'Because they never talk',
                'Because they feel heard and respected',
                'Because they always agree',
                'Because they avoid problems',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 124000,
            'type' => 'multiple_choice',
            'question' => 'How can we become more open-minded?',
            'options' => [
                'By judging quickly',
                'By ignoring differences',
                'By asking questions and showing interest',
                'By avoiding new experiences',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 132000,
            'type' => 'multiple_choice',
            'question' => 'Complete the sentence: Being open-minded means being willing to consider new ideas and ________.',
            'options' => [
                'judgments',
                'perspectives',
                'arguments',
                'mistakes',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 136000,
            'type' => 'multiple_choice',
            'question' => "Complete the sentence: We can become more open-minded by asking questions and showing ________ in other people's lives.",
            'options' => [
                'interest',
                'fear',
                'anger',
                'silence',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 8,
            'text' => 'We are all different. We have different hobbies, likes, dislikes, cultures, families, and religions.',
        ],
        [
            'start' => 8.5,
            'end' => 13,
            'text' => 'That is what makes our world interesting and unique.',
        ],
        [
            'start' => 13.5,
            'end' => 22,
            'text' => 'To appreciate these differences, we need to be open-minded.',
        ],
        [
            'start' => 22.5,
            'end' => 32,
            'text' => 'Being open-minded means being willing to consider new ideas, perspectives, and ways of doing things, even if they are different from our own.',
        ],
        [
            'start' => 32.5,
            'end' => 44,
            'text' => 'For example, we can be open-minded by trying a new food, learning a new sport, or listening to someone explain a tradition that is different from ours.',
        ],
        [
            'start' => 44.5,
            'end' => 52,
            'text' => 'Being open-minded helps us learn from others. We can discover new cultures, music, foods, and customs.',
        ],
        [
            'start' => 52.5,
            'end' => 62,
            'text' => 'It also helps us build stronger friendships because people feel heard, respected, and valued when we listen to them without judging.',
        ],
        [
            'start' => 62.5,
            'end' => 73,
            'text' => 'Open-mindedness can also help us solve problems. By thinking about another person’s feelings and perspective, we can understand them better and work together more successfully.',
        ],
        [
            'start' => 73.5,
            'end' => 83,
            'text' => 'However, being open-minded is not always easy. It takes practice.',
        ],
        [
            'start' => 83.5,
            'end' => 94,
            'text' => 'We can become more open-minded by asking questions, showing interest in others, being kind, and avoiding quick judgments.',
        ],
        [
            'start' => 94.5,
            'end' => 97,
            'text' => 'Look at these examples:',
        ],
        [
            'start' => 97.5,
            'end' => 104,
            'text' => '“I’ve never done that before. I would love for you to teach me.” Open-minded.',
        ],
        [
            'start' => 104.5,
            'end' => 111,
            'text' => '“We don’t eat that at home, but I would love to try it.” Open-minded.',
        ],
        [
            'start' => 111.5,
            'end' => 116,
            'text' => '“That food looks gross.” Closed-minded.',
        ],
        [
            'start' => 116.5,
            'end' => 124,
            'text' => '“My family doesn’t celebrate that. Can you tell me more about it?” Open-minded.',
        ],
        [
            'start' => 124.5,
            'end' => 134,
            'text' => 'Being open-minded is like a superpower. The more we practice it, the better we become at understanding others and appreciating what makes each person unique.',
        ],
        [
            'start' => 134.5,
            'end' => 139,
            'text' => 'How will you use your open-minded superpower today?',
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])