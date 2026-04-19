<?php
$content = [
    'title'          => "Let’s watch this video",
    'video'          => materialAsset('slider/A2/Beginner/chapter-3/'),
    'thumbnail'      => materialAsset('slider/A2/Beginner/chapter-3/img/slide14.webp'),
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions' => [
        [
            'time' => 17000,
            'type' => 'multiple_choice',
            'question' => '1- Why did Anna feel cold?',
            'options' => [
                'She was sick',
                'The weather changed quickly',
                'She forgot her jacket',
                'It was nighttime'
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 42000,
            'type' => 'multiple_choice',
            'question' => '2- What did they say about rainy days?',
            'options' => [
                'They both hate them completely',
                'They like staying home when it rains',
                'They enjoy walking in the rain',
                'They always go outside'
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 61000,
            'type' => 'multiple_choice',
            'question' => '3- What did Anna and Leo order?',
            'options' => [
                'Tea and coffee',
                'Juice and water',
                'Hot chocolate and cappuccino',
                'Milk and soda'
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => "Anna: Hi Leo! It’s been so long."],
        ['start' => 3,  'end' => 5,  'text' => "Leo: I know! How are you?"],
        ['start' => 5,  'end' => 9,  'text' => "Anna: I’m good, just a bit cold. The weather changed so fast."],
        ['start' => 9,  'end' => 12, 'text' => "Leo: True. Yesterday was warm, today feels like winter."],
        ['start' => 12, 'end' => 14, 'text' => "Anna: I brought a big jacket."],
        ['start' => 14, 'end' => 17, 'text' => "Leo: Lucky you—I only have a light sweater."],
        ['start' => 17, 'end' => 20, 'text' => "Anna: Did you hear the forecast? It might rain."],
        ['start' => 20, 'end' => 22, 'text' => "Leo: Really? I don’t have an umbrella."],
        ['start' => 22, 'end' => 25, 'text' => "Anna: Me neither. Maybe we should buy one."],
        ['start' => 25, 'end' => 29, 'text' => "Leo: I like rainy days at home—tea and movies."],
        ['start' => 29, 'end' => 32, 'text' => "Anna: Same, but walking in the rain is the worst."],
        ['start' => 32, 'end' => 35, 'text' => "Leo: Do you prefer hot or cold weather?"],
        ['start' => 35, 'end' => 38, 'text' => "Anna: Warm weather, like spring."],
        ['start' => 38, 'end' => 42, 'text' => "Leo: Same. Summer is too hot, and winter mornings are hard."],
        ['start' => 42, 'end' => 44, 'text' => "Anna: Oh, it’s starting to rain."],
        ['start' => 44, 'end' => 46, 'text' => "Leo: Good thing we’re inside."],
        ['start' => 46, 'end' => 48, 'text' => "Anna: Let’s get something warm."],
        ['start' => 48, 'end' => 50, 'text' => "Leo: Hot chocolate?"],
        ['start' => 50, 'end' => 52, 'text' => "Anna: Perfect."],
        ['start' => 52, 'end' => 54, 'text' => "Server: What can I get you?"],
        ['start' => 54, 'end' => 57, 'text' => "Anna: One hot chocolate, please."],
        ['start' => 57, 'end' => 60, 'text' => "Leo: And one cappuccino."],
        ['start' => 60, 'end' => 62, 'text' => "Server: Coming right up."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])