<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Intermediate/chapter-1/img/slide5.webp'),
    'isQuiz'   => 0,

    'questions' => [
        [
            'prompt'  => 'Why does Mia think Laura is popular?',
            'correct' => 'She has 800 friends.',
            'options' => [
                'She has many photos.',
                'She has a lot of followers.',
                'She has 800 friends.',
                'She posts every day.',
            ],
        ],
        [
            'prompt'  => "What does Emma think about Laura's 800 friends?",
            'correct' => "They can't all be real friends.",
            'options' => [
                'They are all real friends.',
                "They can't all be real friends.",
                'They are all family members.',
                'They are all classmates.',
            ],
        ],
        [
            'prompt'  => 'According to Mia, what might be true about Laura?',
            'correct' => 'She might be lonely.',
            'options' => [
                'She might be lonely.',
                'She might be famous.',
                'She might be a teacher.',
                'She might be traveling.',
            ],
        ],
        [
            'prompt'  => 'What is better than having hundreds of social media friends?',
            'correct' => 'Having a few real friends.',
            'options' => [
                'Having no friends.',
                'Having famous friends.',
                'Having a few real friends.',
                'Having online friends.',
            ],
        ],
        [
            'prompt'  => 'How do the girls know Laura is online?',
            'correct' => "She replies to Emma's friend request.",
            'options' => [
                'She uploads a photo.',
                'She sends a message.',
                "She replies to Emma's friend request.",
                'She changes her profile picture.',
            ],
        ],
        [
            'prompt'  => 'She _____ be really popular.',
            'correct' => 'must',
            'options' => [
                "can't",
                'must',
                "shouldn't",
                'would',
            ],
        ],
        [
            'prompt'  => "They _____ all be real friends.",
            'correct' => "can't",
            'options' => [
                'must',
                'could',
                "can't",
                'should',
            ],
        ],
        [
            'prompt'  => 'She _____ be a bit lonely.',
            'correct' => 'might',
            'options' => [
                'might',
                "mustn't",
                'has to',
                'will',
            ],
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 5,    'text' => "Look! Laura Smith is on Facebook. I'm going to send her a friend request."],
        ['start' => 5.5,  'end' => 9,    'text' => "Wow! She's got 800 friends. She must be really popular."],
        ['start' => 9.5,  'end' => 15,   'text' => "Well, they can't all be real friends. No one can have that many friends."],
        ['start' => 15.5, 'end' => 19,   'text' => 'That’s true. She may not really know most of them.'],
        ['start' => 19.5, 'end' => 26,   'text' => 'Yes, she must have about 20 proper friends at the most. The rest might just be acquaintances.'],
        ['start' => 26.5, 'end' => 31,   'text' => 'She probably accepts anyone who wants to be her friend.'],
        ['start' => 31.5, 'end' => 33,   'text' => 'Why does she do that?'],
        ['start' => 33.5, 'end' => 39,   'text' => "I don't know. She might be a bit lonely. Maybe it makes her feel better."],
        ['start' => 39.5, 'end' => 45,   'text' => "But that can't work. Having lots of false friends doesn't make anyone feel better."],
        ['start' => 45.5, 'end' => 55,   'text' => "Exactly. It's better to have a few real friends than hundreds of social media friends who might not be there for you and could disappear."],
        ['start' => 55.5, 'end' => 61,   'text' => "Oh look! She must be online because she's replied to my request already."],
        ['start' => 61.5, 'end' => 64,   'text' => 'Really? What did she say?'],
        ['start' => 64.5, 'end' => 68,   'text' => "I can't believe it! She said no!"],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])