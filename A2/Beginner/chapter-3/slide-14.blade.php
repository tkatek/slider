<?php
$content = [
    'title'          => "Let’s watch this video",
    'video'          => materialAsset('slider/A2/Beginner/chapter-3/video/talking-encrypted/talking.m3u8'),
    'thumbnail'      => materialAsset('slider/A2/Beginner/chapter-3/img/slide14.webp'),
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions' => [
        [
            'time' => 11200,
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
            'time' => 33000,
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
            'time' => 62200,
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
        ['start' => 0,  'end' => 2.5,  'text' => "Anna: Hi Leo! It’s been so long."],
        ['start' => 2.5,  'end' => 4.5,  'text' => "Leo: I know! How are you?"],
        ['start' => 4.5,  'end' => 8,  'text' => "Anna: I’m good, just a bit cold. The weather changed so fast."],
        ['start' => 8,  'end' => 11, 'text' => "Leo: True. Yesterday was warm, today feels like winter."],
        ['start' => 11.5, 'end' => 13.5, 'text' => "Anna: I brought a big jacket."],
        ['start' => 13.5, 'end' => 16, 'text' => "Leo: Lucky you—I only have a light sweater."],
        ['start' => 16, 'end' => 17, 'text' => "Anna: Let's sit down."],
        ['start' => 18.7, 'end' => 22, 'text' => "Anna: Did you hear the forecast? It might rain."],
        ['start' => 22, 'end' => 24, 'text' => "Leo: Really? I don’t have an umbrella."],
        ['start' => 24.7, 'end' => 26.5, 'text' => "Anna: Me neither. Maybe we should buy one."],
        ['start' => 27, 'end' => 29.5, 'text' => "Leo: I like rainy days at home—tea and movies."],
        ['start' => 30.7, 'end' => 33, 'text' => "Anna: Same, but walking in the rain is the worst."],
        ['start' => 34, 'end' => 36, 'text' => "Leo: Do you prefer hot or cold weather?"],
        ['start' => 37, 'end' => 39, 'text' => "Anna: Warm weather, like spring."],
        ['start' => 39.5, 'end' => 43, 'text' => "Leo: Same. Summer is too hot, and winter mornings are hard."],
        ['start' => 43.7, 'end' => 45.5, 'text' => "Anna: Oh, it’s starting to rain."],
        ['start' => 46.7, 'end' => 49, 'text' => "Leo: Good thing we’re inside."],
        ['start' => 49.7, 'end' => 51.5, 'text' => "Anna: Let’s get something warm."],
        ['start' => 51.8, 'end' => 53, 'text' => "Leo: Hot chocolate?"],
        ['start' => 53, 'end' => 54, 'text' => "Anna: Perfect."],
        ['start' => 56, 'end' => 57, 'text' => "Server: What can I get you?"],
        ['start' => 57.7, 'end' => 59, 'text' => "Anna: One hot chocolate, please."],
        ['start' => 59.5, 'end' => 60.5, 'text' => "Leo: And one cappuccino."],
        ['start' => 60.5, 'end' => 62, 'text' => "Server: Coming right up."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])