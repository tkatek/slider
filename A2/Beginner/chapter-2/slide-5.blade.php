<?php
$content = [
    'video'      => materialAsset(''),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-2/img/slide5.webp'),
    'isQuiz'     => 0,
    'showTranscript' => 0,

    'questions'  => [
        [
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => "What's the weather like in spring in Japan?",
            'options' => ['It never rains in spring.', 'True', 'False'],
            'correct_answer' => 2,
            'points' => 10
        ],

        [
            'time' => 44000,
            'type' => 'multiple_choice',
            'question' => 'In Japan, summer is .....',
            'options' => ['cold', 'humid', 'stormy', 'rainy'],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 58000,
            'type' => 'multiple_choice',
            'question' => 'Autumn is......than summer in Japan.',
            'options' => ['good', 'bad', 'better'],
            'correct_answer' => 2,
            'points' => 10
        ],

        [
            'time' => 66000,
            'type' => 'multiple_choice',
            'question' => 'It .................in Japan.',
            'options' => ['sometimes snows', 'always snows', "doesn't snow"],
            'correct_answer' => 0,
            'points' => 10
        ],

        [
            'time' => 70000,
            'type' => 'multiple_choice',
            'question' => 'Does it snow in the north of Japan?',
            'options' => ['Yes, it does.', "No, it doesn't"],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 4,  'end' => 8,  'text' => "I love spring. What's the weather like in Japan in spring, Takashi?"],
        ['start' => 8,  'end' => 12, 'text' => "It's really nice. It's sunny and warm."],
        ['start' => 12, 'end' => 17, 'text' => 'Sometimes it rains, but the sky is usually clear and blue.'],
        ['start' => 17, 'end' => 23, 'text' => "It's my favorite season because everything feels so fresh."],
        ['start' => 23, 'end' => 27, 'text' => 'Wow, that sounds nice. How about summer?'],
        ['start' => 27, 'end' => 32, 'text' => 'Summer is hot. I like hot weather.'],
        ['start' => 32, 'end' => 40, 'text' => 'Japan summer is too humid. I prefer to stay inside and use the air conditioning.'],
        ['start' => 40, 'end' => 46, 'text' => "That sounds different to summer in the UK. What's autumn like in Japan?"],
        ['start' => 46, 'end' => 53, 'text' => "It's better than summer because it's cooler. The air is fresh."],
        ['start' => 53, 'end' => 57, 'text' => "And it's often quite windy. And how about winter?"],
        ['start' => 57, 'end' => 65, 'text' => 'Winter is really cold and very dry. Sometimes it snows too in the northern parts of Japan.'],
        ['start' => 65, 'end' => 69, 'text' => 'There is often a lot of snow.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
