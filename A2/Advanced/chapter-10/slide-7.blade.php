<?php

$content = [
    'video'     => materialAsset('slider/A2/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-10/img/slide7.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time' => 90000,
            'type' => 'multiple_choice',
            'question' => 'Why did Sharon complain?',
            'options' => [
                'The apartment was dirty.',
                'The music was too loud.',
                'The elevator was broken.',
                'The lights were off.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 95000,
            'type' => 'multiple_choice',
            'question' => 'Why didn’t Sharon like the noise?',
            'options' => [
                'She was studying.',
                'She was sick.',
                'She had to wake up early.',
                'She wanted to watch TV.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 100000,
            'type' => 'multiple_choice',
            'question' => 'What was the neighbor doing?',
            'options' => [
                'Cleaning the apartment',
                'Having a birthday party',
                'Cooking dinner',
                'Watching a movie',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 105000,
            'type' => 'multiple_choice',
            'question' => 'Who did Sharon call?',
            'options' => [
                'The police',
                'Her friend',
                'Building security',
                'Her manager',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 110000,
            'type' => 'multiple_choice',
            'question' => 'What did security promise to do?',
            'options' => [
                'Call the police',
                'Move Sharon to another room',
                'Talk to the neighbor',
                'End the birthday party immediately',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 5,
            'text' => "Sharon: Hi, excuse me. Your music is so loud. Can you keep it down?",
        ],
        [
            'start' => 5,
            'end' => 10,
            'text' => "Sharon: I have to go to work at 6:00 a.m. tomorrow.",
        ],
        [
            'start' => 10,
            'end' => 14,
            'text' => "Neighbor: My music is fine. It's my birthday party.",
        ],
        [
            'start' => 14,
            'end' => 19,
            'text' => "Sharon: If you don't turn it down, I will call security.",
        ],
        [
            'start' => 19,
            'end' => 22,
            'text' => "Neighbor: Go ahead. You're being selfish.",
        ],
        [
            'start' => 22,
            'end' => 26,
            'text' => "Sharon: I will call them right away.",
        ],
        [
            'start' => 26,
            'end' => 30,
            'text' => "Sharon: Is this the building security?",
        ],
        [
            'start' => 30,
            'end' => 33,
            'text' => "Security: Yes, what can I help you with?",
        ],
        [
            'start' => 33,
            'end' => 40,
            'text' => "Sharon: I'm Sharon. I'm a resident of this building. I live on the 16th floor, and I want to report a problem.",
        ],
        [
            'start' => 40,
            'end' => 44,
            'text' => "Security: Yes? Can you be more specific?",
        ],
        [
            'start' => 44,
            'end' => 48,
            'text' => "Sharon: My neighbor is playing music so loud!",
        ],
        [
            'start' => 48,
            'end' => 55,
            'text' => "Security: Okay, calm down, madam. What are your neighbor's name and house number?",
        ],
        [
            'start' => 55,
            'end' => 60,
            'text' => "Sharon: I don't know her name, but her house number is 1602.",
        ],
        [
            'start' => 60,
            'end' => 64,
            'text' => "Security: Have you spoken to her about this problem?",
        ],
        [
            'start' => 64,
            'end' => 71,
            'text' => "Sharon: Yes, and she said it was because of her birthday, but I have to get up early tomorrow.",
        ],
        [
            'start' => 71,
            'end' => 78,
            'text' => "Security: I understand. Our building policy doesn't allow residents to play music loudly.",
        ],
        [
            'start' => 78,
            'end' => 84,
            'text' => "Sharon: I believe other people who live on our floor feel uncomfortable too.",
        ],
        [
            'start' => 84,
            'end' => 92,
            'text' => "Security: Yes, madam. Don't worry. I will make a report, and I will come there myself to talk to her.",
        ],
        [
            'start' => 92,
            'end' => 97,
            'text' => "Security: Your problem will be solved very soon.",
        ],
        [
            'start' => 97,
            'end' => 101,
            'text' => "Sharon: That would be nice. Thank you so much.",
        ],
        [
            'start' => 101,
            'end' => 105,
            'text' => "Security: It's my duty, madam. Good night.",
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])