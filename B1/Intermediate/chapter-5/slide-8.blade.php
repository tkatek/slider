<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset(''),
    'isQuiz'   => 1,

    'questions' => [
        [
            'time' => 8000,
            'type' => 'multiple_choice',
            'question' => 'What does "engaged" mean?',
            'options' => [
                'Interested and actively involved',
                'Very famous',
                'Working online',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 22000,
            'type' => 'multiple_choice',
            'question' => 'What is a "trend"?',
            'options' => [
                'A type of social media',
                'Something that becomes popular',
                'A person who creates videos',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 36000,
            'type' => 'multiple_choice',
            'question' => 'What does "promote" mean?',
            'options' => [
                'To hide something',
                'To advertise or support something',
                'To buy something',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 50000,
            'type' => 'multiple_choice',
            'question' => 'Who is a "creator"?',
            'options' => [
                'A person who makes online content',
                'A person who follows influencers',
                'A person who sells products',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 64000,
            'type' => 'multiple_choice',
            'question' => 'What is "recognition"?',
            'options' => [
                'Being known by many people',
                'A social media platform',
                'A type of content',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 78000,
            'type' => 'multiple_choice',
            'question' => 'Who is an "expert"?',
            'options' => [
                'A person with a lot of knowledge about a subject',
                'A person with many followers',
                'A person who owns a company',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 8, 'text' => 'An influencer is someone who can influence other people. They use their knowledge, personality, or experience to build a strong connection with their followers.'],
        ['start' => 8.5, 'end' => 19, 'text' => 'A social media influencer becomes popular through platforms such as YouTube, Instagram, or TikTok. They create content and share it with their audience.'],
        ['start' => 19.5, 'end' => 27, 'text' => 'Many companies work with influencers to promote products and brands.'],
        ['start' => 27.5, 'end' => 31, 'text' => 'There are different types of influencers.'],
        ['start' => 31.5, 'end' => 40, 'text' => 'Mega influencers have more than one million followers. They are often celebrities such as actors, musicians, or athletes.'],
        ['start' => 40.5, 'end' => 50, 'text' => 'Macro influencers have between 40,000 and one million followers. They are usually experts who understand their audience very well.'],
        ['start' => 50.5, 'end' => 61, 'text' => 'Micro influencers have between 1,000 and 40,000 followers. They often focus on a specific niche such as photography, fitness, or cooking.'],
        ['start' => 61.5, 'end' => 72, 'text' => 'Nano influencers have fewer than 1,000 followers. Although their audience is small, their followers are usually highly engaged and trust their opinions.'],
        ['start' => 72.5, 'end' => 82, 'text' => 'Today, influencers play an important role in social media. They can influence people\'s choices, promote products, and create new trends.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])