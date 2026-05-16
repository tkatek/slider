<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-11/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-11/img/slide7.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 18,
            'type'           => 'multiple_choice',
            'question'       => 'What was wrong with the pasta?',
            'options'        => [
                'It was too spicy',
                'It was cold',
                'It was expensive',
            ],
            'correct_answer' => 'It was cold',
            'points'         => 1,
        ],
        [
            'time'           => 52,
            'type'           => 'multiple_choice',
            'question'       => 'What did the waiter offer the customer?',
            'options'        => [
                'A dessert',
                'A free drink',
                'Another table',
            ],
            'correct_answer' => 'A free drink',
            'points'         => 1,
        ],
        [
            'time'           => 76,
            'type'           => 'multiple_choice',
            'question'       => 'What happened at the end?',
            'options'        => [
                'The customer left angry',
                'The food stayed cold',
                'The restaurant removed the dish from the bill',
            ],
            'correct_answer' => 'The restaurant removed the dish from the bill',
            'points'         => 1,
        ],
        [
            'time'           => 82,
            'type'           => 'multiple_choice',
            'question'       => 'Complete the sentence: The chicken pasta was __________.',
            'options'        => [
                'Cold',
                'Spicy',
                'Expensive',
            ],
            'correct_answer' => 'Cold',
            'points'         => 1,
        ],
        [
            'time'           => 88,
            'type'           => 'multiple_choice',
            'question'       => 'Complete the sentence: The waiter offered a free __________.',
            'options'        => [
                'Drink',
                'Dessert',
                'Table',
            ],
            'correct_answer' => 'Drink',
            'points'         => 1,
        ],
        [
            'time'           => 94,
            'type'           => 'true_false',
            'question'       => 'The customer asked for a different dish.',
            'options'        => [
                'True',
                'False',
            ],
            'correct_answer' => 'False',
            'points'         => 1,
        ],
        [
            'time'           => 100,
            'type'           => 'true_false',
            'question'       => 'The waiter listened politely and solved the problem.',
            'options'        => [
                'True',
                'False',
            ],
            'correct_answer' => 'True',
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,  'end' => 4,  'text' => 'Customer: Excuse me. Could I tell you something about my food?'],
        ['start' => 4,  'end' => 7,  'text' => 'Waiter: Of course. What’s the problem?'],
        ['start' => 7,  'end' => 13, 'text' => 'Customer: My chicken pasta is cold and the chicken looks a little undercooked.'],
        ['start' => 13, 'end' => 20, 'text' => 'Waiter: I’m very sorry about that. That shouldn’t happen. Let me take it back to the kitchen.'],
        ['start' => 20, 'end' => 22, 'text' => 'Customer: Thank you.'],

        ['start' => 22, 'end' => 27, 'text' => 'Waiter: Would you like the same dish again or something different?'],
        ['start' => 27, 'end' => 33, 'text' => 'Customer: The same dish is fine, but please make sure it’s cooked well.'],
        ['start' => 33, 'end' => 38, 'text' => 'Waiter: No problem. I’ll tell the chef. Thank you for your patience.'],
        ['start' => 38, 'end' => 41, 'text' => 'Customer: Thanks for helping.'],

        ['start' => 41, 'end' => 49, 'text' => 'Waiter: While you wait, can I offer you a free drink? Maybe a soft drink or some water?'],
        ['start' => 49, 'end' => 53, 'text' => 'Customer: A glass of water would be great. Thank you.'],
        ['start' => 53, 'end' => 56, 'text' => 'Waiter: Of course. I’ll bring that right away.'],

        ['start' => 56, 'end' => 63, 'text' => 'Waiter: Here is your new chicken pasta. Could you check if it’s okay now?'],
        ['start' => 63, 'end' => 67, 'text' => 'Customer: Yes, it’s hot and tastes good now.'],
        ['start' => 67, 'end' => 72, 'text' => 'Waiter: Wonderful. We also removed it from your bill.'],
        ['start' => 72, 'end' => 75, 'text' => 'Customer: Oh, thank you very much.'],
        ['start' => 75, 'end' => 79, 'text' => 'Waiter: You’re welcome. Enjoy the rest of your meal.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])