<?php
$content = [
    'video'      => materialAsset(''),
    'thumbnail'  => materialAsset(''),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 6000,
            'type' => 'true_false',
            'question' => 'Question 1: Anna and John think they are healthy.',
            'correct_answer' => false,
            'points' => 10
        ],
        [
            'time' => 12000,
            'type' => 'true_false',
            'question' => 'Question 2: They want to exercise more.',
            'correct_answer' => true,
            'points' => 10
        ],
        [
            'time' => 26000,
            'type' => 'true_false',
            'question' => 'Question 3: The Atkins diet includes a lot of bread and pasta.',
            'correct_answer' => false,
            'points' => 10
        ],
        [
            'time' => 40000,
            'type' => 'true_false',
            'question' => 'Question 4: A vegan diet includes meat and eggs.',
            'correct_answer' => false,
            'points' => 10
        ],
        [
            'time' => 76000,
            'type' => 'true_false',
            'question' => 'Question 5: They decide to talk to a doctor before changing their diet.',
            'correct_answer' => true,
            'points' => 10
        ],
        [
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => 'Question 6: Why do Anna and John want to change their lifestyle?',
            'options' => ['They want to travel', 'They want to lose weight', 'They want to cook more'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => 'Question 7: What do people eat in the Atkins diet?',
            'options' => ['A lot of bread and rice', 'Only fruits', 'More meat, fish, and eggs'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 62000,
            'type' => 'multiple_choice',
            'question' => 'Question 8: What is special about the 5:2 diet?',
            'options' => ['You eat only vegetables', 'You eat less food for 2 days', 'You don’t eat for 5 days'],
            'correct_answer' => 1,
            'points' => 10
        ]
    ],
    'subtitles'  => [
        ['start' => 0,  'end' => 6,  'text' => 'Anna: John, we are not very healthy now. I think we both need to lose some weight.'],
        ['start' => 6,  'end' => 8,  'text' => 'John: You’re right.'],
        ['start' => 8,  'end' => 12, 'text' => 'Anna: So, should we start exercising more?'],
        ['start' => 12, 'end' => 18, 'text' => 'John: Yes, absolutely. We should also eat healthier food. I want to feel better.'],
        ['start' => 18, 'end' => 22, 'text' => 'Anna: Me too. Have you heard of the Atkins diet? We can try that.'],
        ['start' => 22, 'end' => 35, 'text' => 'John: I think I know it. It is famous. In the Atkins diet, you eat less bread, rice, and pasta. You eat more meat, fish, eggs, and vegetables. Your body burns fat for energy. It helps you lose weight.'],
        ['start' => 35, 'end' => 43, 'text' => 'Anna: That sounds good. But maybe we can try a vegan diet? A vegan diet has no meat and no animal products. I heard it is good for the heart. It is also better for animals.'],
        ['start' => 43, 'end' => 57, 'text' => 'John: That is true. But vegan food is not always balanced. What about the paleo diet? In the paleo diet, you eat only natural food. You eat meat, fish, fruits, and vegetables. You do not eat processed food like chips or sweets. People say it helps you lose weight and feel healthy.'],
        ['start' => 57, 'end' => 69, 'text' => 'Anna: I don’t know. It sounds like a fashion diet. There is another diet I like. It is called the 5:2 diet. You eat normal food for 5 days. For 2 days, you eat very little — only 500 or 600 calories. This helps you lose weight and keeps your muscles strong.'],
        ['start' => 69, 'end' => 72, 'text' => 'John: That sounds good. Let’s try it!'],
        ['start' => 72, 'end' => 80, 'text' => 'Anna: Okay, let’s try it. But first, we should talk to our doctor. It is important to ask a doctor before you change your diet a lot.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])