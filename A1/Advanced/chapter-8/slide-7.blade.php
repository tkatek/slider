<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-8/video/'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-8/video/video-thumbnail-quiz.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 30000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: How do they describe the neighbourhood?',
            'options' => [
                'Dangerous and crowded',
                'Safe and quiet',
                'Old and empty',
                'Noisy and busy',
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 23000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: What kind of people live in the neighbourhood?',
            'options' => [
                'Only students',
                'Only families',
                'Older people, young families, and students',
                'Only workers',
            ],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 58000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: What do they say about restaurants?',
            'options' => [
                'There are no restaurants',
                'There are a few restaurants',
                'There are a lot of restaurants',
                'There is one restaurant',
            ],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 50000,
            'type' => 'multiple_choice',
            'question' => 'Question 4: How long does it take to get downtown?',
            'options' => [
                'One hour',
                'Thirty minutes',
                'Ten minutes',
                'A few minutes',
            ],
            'correct_answer' => 4,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 10, 'end' => 16, 'text' => "We really like the apartment. Yeah, it's good. Very roomy. Good. What's the neighbourhood like?"],
        ['start' => 16, 'end' => 25, 'text' => "Oh, it's a very special neighbourhood. There's a real mix of people here. There are older people, young families, and students."],
        ['start' => 25, 'end' => 27, 'text' => "There's a lot of different cultures."],
        ['start' => 27, 'end' => 32, 'text' => "Oh, yes. It's very safe. And quiet. There isn't much noise."],
        ['start' => 32, 'end' => 43, 'text' => "Well, usually is there much crime? Oh, no. There isn't much now. Well, there were some problems, but that was 10 years ago."],
        ['start' => 43, 'end' => 51, 'text' => "Okay. What about public transportation? The public transportation is excellent. It's just a few minutes to downtown."],
        ['start' => 51, 'end' => 53, 'text' => "We like to eat out. Are there many restaurants and coffee shops?"],
        ['start' => 53, 'end' => 65, 'text' => "Oh, yes. There are a lot of restaurants. Just take a walk down the street to the end and you'll see there are lots of Greek and Italian restaurants. There's Indian, Chinese, everything."],
        ['start' => 65, 'end' => 72, 'text' => "Sounds great. Okay, let's take a look. Thank you for your help."],
        ['start' => 72, 'end' => 80, 'text' => "It was my pleasure. Give me a call this afternoon because this apartment won't last long."],
        ['start' => 80, 'end' => 85, 'text' => "Okay, thank you. Bye-bye. Bye."],
        ['start' => 85, 'end' => 107, 'text' => '[Music]'],
        ['start' => 107, 'end' => 117, 'text' => "I love that bookstore. What a great neighbourhood. Yeah, there's a movie theater and restaurants. There's a furniture store."],
        ['start' => 117, 'end' => 128, 'text' => "Yeah. And there's a jewelry store. My birthday's coming up next month. Yeah, I know."],
        ['start' => 128, 'end' => 140, 'text' => "Look, Luis, there's a really nice grocery store. Yeah, it's a nice grocery store. And there are a lot of really good coffee shops."],
        ['start' => 140, 'end' => 146, 'text' => "I really like this neighbourhood. Yeah, it's really great."],
        ['start' => 146, 'end' => 150, 'text' => '[Music]'],
        ['start' => 150, 'end' => 155, 'text' => "Wow. That's an amazing guitar."],
        ['start' => 155, 'end' => 161, 'text' => "So, can we take the apartment? Sure, why not? Let's go for it."],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])