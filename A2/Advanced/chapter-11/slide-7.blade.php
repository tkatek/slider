<?php

$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-11/videos/food-complaints-encrypted/food-complaints.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-11/img/slide7.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time' => 10100,
            'type' => 'multiple_choice',
            'question' => 'What was wrong with the pasta?',
            'options' => [
                'It was too spicy',
                'It was cold',
                'It was expensive',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // Answer: "My chicken pasta is cold."
            // Silent gap: 10–10.5 seconds.
            'time' => 10300,
            'type' => 'multiple_choice',
            'question' => 'Complete the sentence: The chicken pasta was __________.',
            'options' => [
                'Cold',
                'Spicy',
                'Expensive',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 27200,
            'type' => 'true_false',
            'question' => 'The customer asked for a different dish.',
            'options' => [
                'True',
                'False',
            ],
            'correct_answer' => 'False',
            'points' => 10,
        ],
        [
            'time' => 33100,
            'type' => 'multiple_choice',
            'question' => 'What did the waiter offer the customer?',
            'options' => [
                'A dessert',
                'A free drink',
                'Another table',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 33300,
            'type' => 'multiple_choice',
            'question' => 'Complete the sentence: The waiter offered a free __________.',
            'options' => [
                'Drink',
                'Dessert',
                'Table',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 50200,
            'type' => 'true_false',
            'question' => 'The waiter listened politely and solved the problem.',
            'options' => [
                'True',
                'False',
            ],
            'correct_answer' => 'True',
            'points' => 10,
        ],
        [
            'time' => 55200,
            'type' => 'multiple_choice',
            'question' => 'What happened at the end?',
            'options' => [
                'The customer left angry',
                'The food stayed cold',
                'The restaurant removed the dish from the bill',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 4,
            'text' => 'Customer: Excuse me. Could I tell you something about my food?',
        ],
        [
            'start' => 4,
            'end' => 5.5,
            'text' => 'Waiter: Of course. What’s the problem?',
        ],
        [
            'start' => 5.7,
            'end' => 10,
            'text' => 'Customer: My chicken pasta is cold and the chicken looks a little undercooked.',
        ],
        [
            'start' => 10.5,
            'end' => 15.5,
            'text' => 'Waiter: I’m very sorry about that. That shouldn’t happen. Let me take it back to the kitchen.',
        ],
        [
            'start' => 15.5,
            'end' => 16.5,
            'text' => 'Customer: Thank you.',
        ],
        [
            'start' => 16.5,
            'end' => 19,
            'text' => 'Waiter: Would you like the same dish again or something different?',
        ],
        [
            'start' => 20,
            'end' => 23.5,
            'text' => 'Customer: The same dish is fine, but please make sure it’s cooked well.',
        ],
        [
            'start' => 23.5,
            'end' => 26,
            'text' => 'Waiter: No problem. I’ll tell the chef. Thank you for your patience.',
        ],
        [
            'start' => 26,
            'end' => 27,
            'text' => 'Customer: Thanks for helping.',
        ],
        [
            'start' => 29.5,
            'end' => 33,
            'text' => 'Waiter: While you wait, can I offer you a free drink? Maybe a soft drink or some water?',
        ],
        [
            'start' => 33.5,
            'end' => 36,
            'text' => 'Customer: A glass of water would be great. Thank you.',
        ],
        [
            'start' => 36,
            'end' => 38,
            'text' => 'Waiter: Of course. I’ll bring that right away.',
        ],
        [
            'start' => 40.5,
            'end' => 44,
            'text' => 'Waiter: Here is your new chicken pasta. Could you check if it’s okay now?',
        ],
        [
            'start' => 47.5,
            'end' => 50,
            'text' => 'Customer: Yes, it’s hot and tastes good now.',
        ],
        [
            'start' => 52,
            'end' => 55,
            'text' => 'Waiter: Wonderful. We also removed it from your bill.',
        ],
        [
            'start' => 55.5,
            'end' => 57,
            'text' => 'Customer: Oh, thank you very much.',
        ],
        [
            'start' => 57.5,
            'end' => 61,
            'text' => 'Waiter: You’re welcome. Enjoy the rest of your meal.',
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])