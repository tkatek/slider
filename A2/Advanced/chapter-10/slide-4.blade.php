<?php

$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-10/video/complaint-encrypted/complaint.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-10/img/slide4.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            // Answer: "Your music is so loud."
            // Silent gap: 9.5–10 seconds.
            'time' => 9700,
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
            // Answer: "It's my birthday party."
            // Silent gap: 14.5–15 seconds.
            'time' => 14800,
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
            // Answer: "Is this the building security?"
            // Silent gap: 27–27.7 seconds.
            'time' => 27200,
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
            // Answer: "I will come there myself to talk to her."
            // Silent gap: 75–75.5 seconds.
            'time' => 75200,
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
            'start' => 6,
            'end' => 9.5,
            'text' => "Sharon: Hi, excuse me. Your music is so loud. Can you keep it down?",
        ],
        [
            'start' => 10,
            'end' => 12,
            'text' => "Sharon: I have to go to work at 6:00 a.m. tomorrow.",
        ],
        [
            'start' => 12,
            'end' => 14.5,
            'text' => "Neighbor: My music is fine. It's my birthday party.",
        ],
        [
            'start' => 15,
            'end' => 17.5,
            'text' => "Sharon: If you don't turn it down, I will call security.",
        ],
        [
            'start' => 18,
            'end' => 19.5,
            'text' => "Neighbor: Go ahead. You're being selfish.",
        ],
        [
            'start' => 19.7,
            'end' => 22,
            'text' => "Sharon: I will call them right away.",
        ],
        [
            'start' => 25.5,
            'end' => 27,
            'text' => "Sharon: Is this the building security?",
        ],
        [
            'start' => 27.7,
            'end' => 30,
            'text' => "Security: Yes, what can I help you with?",
        ],
        [
            'start' => 31,
            'end' => 37,
            'text' => "Sharon: I'm Sharon. I'm a resident of this building. I live on the 16th floor, and I want to report a problem.",
        ],
        [
            'start' => 37.7,
            'end' => 40,
            'text' => "Security: Yes? Can you be more specific?",
        ],
        [
            'start' => 41,
            'end' => 43.7,
            'text' => "Sharon: My neighbor is playing music so loud!",
        ],
        [
            'start' => 44,
            'end' => 48,
            'text' => "Security: Okay, calm down, madam. What are your neighbor's name and house number?",
        ],
        [
            'start' => 49,
            'end' => 52,
            'text' => "Sharon: I don't know her name, but her house number is 1202.",
        ],
        [
            'start' => 52.7,
            'end' => 55,
            'text' => "Security: Have you spoken to her about this problem?",
        ],
        [
            'start' => 55.7,
            'end' => 60,
            'text' => "Sharon: Yes, and she said it was because of her birthday, but I have to get up early tomorrow.",
        ],
        [
            'start' => 60,
            'end' => 65,
            'text' => "Security: I understand. Our building policy doesn't allow residents to play music loudly.",
        ],
        [
            'start' => 65.5,
            'end' => 69,
            'text' => "Sharon: I believe other people who live on our floor feel uncomfortable too.",
        ],
        [
            'start' => 69.5,
            'end' => 75,
            'text' => "Security: Yes, madam. Don't worry. I will make a report, and I will come there myself to talk to her.",
        ],
        [
            'start' => 75.5,
            'end' => 77.5,
            'text' => "Security: Your problem will be solved very soon.",
        ],
        [
            'start' => 78,
            'end' => 80.5,
            'text' => "Sharon: That would be nice. Thank you so much.",
        ],
        [
            'start' => 80.7,
            'end' => 84,
            'text' => "Security: It's my duty, madam. Good night.",
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])