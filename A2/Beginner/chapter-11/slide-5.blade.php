<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter11/video/healthy-encrypted/healthy.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter11/img/slide5.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 6000,
            'type' => 'true_false',
            'question' => 'Question 1: Anna and John think they are healthy.',
            'correct_answer' => false,
            'points' => 10
        ],
        [
            'time' => 6100,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Why do Anna and John want to change their lifestyle?',
            'options' => ['They want to travel', 'They want to lose weight', 'They want to cook more'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 12400,
            'type' => 'true_false',
            'question' => 'Question 3: They want to exercise more.',
            'correct_answer' => true,
            'points' => 10
        ],
        [
            'time' => 22200,
            'type' => 'true_false',
            'question' => 'Question 4: The Atkins diet includes a lot of bread and pasta.',
            'correct_answer' => false,
            'points' => 10
        ],
        [
            'time' => 25800,
            'type' => 'multiple_choice',
            'question' => 'Question 5: What do people eat in the Atkins diet?',
            'options' => ['A lot of bread and rice', 'Only fruits', 'More meat, fish, and eggs'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 43200,
            'type' => 'true_false',
            'question' => 'Question 6: A vegan diet includes meat and eggs.',
            'correct_answer' => false,
            'points' => 10
        ],
        [
            'time' => 76200,
            'type' => 'multiple_choice',
            'question' => 'Question 7: What is special about the 5:2 diet?',
            'options' => ['You eat only vegetables', 'You eat less food for 2 days', 'You don’t eat for 5 days'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 82700,
            'type' => 'true_false',
            'question' => 'Question 8: They decide to talk to a doctor before changing their diet.',
            'correct_answer' => true,
            'points' => 10
        ]
    ],
    'subtitles'  => [
        ['start' => 0,    'end' => 1.7,    'text' => 'Anna: John, we are not very healthy now.'],
        ['start' => 1.7,    'end' => 3.5,    'text' => 'Anna: I think we both need to lose some weight.'],

        ['start' => 4.5,    'end' => 5.5,    'text' => 'John: You’re right.'],

        ['start' => 6.5,    'end' => 8,   'text' => 'Anna: So, should we start exercising more?'],

        ['start' => 8.5,   'end' => 10,   'text' => 'John: Yes, absolutely.'],
        ['start' => 10,   'end' => 12.3,   'text' => 'John: We should also eat healthier food. I want to feel better.'],

        ['start' => 12.8,   'end' => 16, 'text' => 'Anna: Me too. Have you heard of the Atkins diet? We can try that.'],

        ['start' => 16.5,   'end' => 18.3, 'text' => 'John: I think I know it. It is famous.'],
        ['start' => 18.7, 'end' => 22, 'text' => 'John: In the Atkins diet, you eat less bread, rice, and pasta.'],
        ['start' => 22.7, 'end' => 25.5, 'text' => 'John: You eat more meat, fish, eggs, and vegetables.'],
        ['start' => 26.5, 'end' => 29,   'text' => 'John: Your body burns fat for energy.'],
        ['start' => 29.5,   'end' => 31,   'text' => 'John: It helps you lose weight.'],

        ['start' => 31,   'end' => 32.5,   'text' => 'Anna: That sounds good.'],
        ['start' => 32.7,   'end' => 34.5,   'text' => 'Anna: But maybe we can try a vegan diet?'],
        ['start' => 35,   'end' => 37.5,   'text' => 'Anna: A vegan diet has no meat and no animal products.'],
        ['start' => 37.5,   'end' => 40,   'text' => 'Anna: I heard it is good for the heart. It is also better for animals.'],

        ['start' => 40,   'end' => 41,   'text' => 'John: That is true.'],
        ['start' => 41,   'end' => 43, 'text' => 'John: But vegan food is not always balanced.'],
        ['start' => 44, 'end' => 45.5, 'text' => 'John: What about the paleo diet?'],
        ['start' => 45.5, 'end' => 47.5,   'text' => 'John: In the paleo diet, you eat only natural food.'],
        ['start' => 47.5,   'end' => 50, 'text' => 'John: You eat meat, fish, fruits, and vegetables.'],
        ['start' => 50.5, 'end' => 54,   'text' => 'John: You do not eat processed food like chips or sweets.'],
        ['start' => 54.5, 'end' => 57,   'text' => 'John: People say it helps you lose weight and feel healthy.'],
        ['start' => 58.5,   'end' => 61.5,   'text' => 'Anna: I don’t know. It sounds like a fashion diet.'],

        ['start' => 62,   'end' => 63.5,   'text' => 'Anna: There is another diet I like.'],
        ['start' => 64,   'end' => 66.3,   'text' => 'Anna: It is called the 5:2 diet.'],
        ['start' => 66.7,   'end' => 68.5,   'text' => 'Anna: You eat normal food for 5 days.'],
        ['start' => 68.7,   'end' => 76,   'text' => 'Anna: For 2 days, you eat very little — only 500 or 600 calories, this help ypu lose weight and keeps your muscles strong.'],

        ['start' => 76.5,   'end' => 78,   'text' => 'John: That sounds good. Let’s try it!'],

        ['start' => 78,   'end' => 79.5,   'text' => 'Anna: Okay, let’s try it.'],
        ['start' => 80,   'end' => 82.5,   'text' => 'Anna: But first, we should talk to our doctor.'],
        ['start' => 83,   'end' => 87,   'text' => 'Anna: It is important to ask a doctor before you change your diet a lot.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])