<?php
$content = [
    'video'      => materialAsset('slider/A2/Beginner/chapter-2/video/the-weather-encrypted/the-weather.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Beginner/chapter-2/img/slide5.webp'),
    'isQuiz'     => 0,
    'showTranscript' => 0,

    'questions'  => [
        [
            // Answer mentioned around 4.5s–11.5s
            'time' => 12500,
            'type' => 'multiple_choice',
            'question' => "What's spring like in Japan?",
            'options' => [
                'It is sunny and warm, and sometimes it rains.',
                'It is very cold and snowy.',
                'It is hot and humid.',
                'It is always cloudy and dry.'
            ],
            'correct_answer' => 0,
            'points' => 10
        ],

        [
            // Answer mentioned around 21s–25s
            'time' => 25500,
            'type' => 'multiple_choice',
            'question' => 'In Japan, summer is .....',
            'options' => [
                'cold',
                'humid',
                'snowy',
                'dry'
            ],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            // Answer mentioned around 29.5s–35s
            'time' => 35500,
            'type' => 'multiple_choice',
            'question' => 'Autumn is ..... than summer in Japan.',
            'options' => [
                'hotter',
                'more humid',
                'better',
                'colder'
            ],
            'correct_answer' => 2,
            'points' => 10
        ],

        [
            // Answer mentioned around 37.5s–41.8s
            'time' => 42500,
            'type' => 'multiple_choice',
            'question' => 'Winter in Japan is .....',
            'options' => [
                'really cold and very dry',
                'hot and humid',
                'sunny and warm',
                'cool and windy'
            ],
            'correct_answer' => 0,
            'points' => 10
        ],

        [
            // Answer mentioned around 41.8s–43s
            'time' => 44500,
            'type' => 'multiple_choice',
            'question' => 'In the northern parts of Japan, there is often .....',
            'options' => [
                'a lot of snow',
                'a lot of rain',
                'hot weather',
                'clear blue sky'
            ],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 4.5,  'text' => "I love spring. What's the weather like in Japan in spring, Ben"],
        ['start' => 4.5,  'end' => 7, 'text' => "It's really nice. It's sunny and warm."],
        ['start' => 7.5, 'end' => 11.5, 'text' => 'Sometimes it rains, but the sky is usually clear and blue.'],
        ['start' => 12, 'end' => 16, 'text' => "It's my favorite season because everything feels so fresh."],
        ['start' => 16.5, 'end' => 18, 'text' => 'How about summer?'],
        ['start' => 18, 'end' => 21, 'text' => 'Summer is hot. But in Japan.'],
        ['start' => 21, 'end' => 25, 'text' => 'Japan summer is too humid. I prefer to stay inside and use the air conditioning.'],
        ['start' => 25, 'end' => 29.5, 'text' => "That sounds different to summer in the UK. What's autumn like in Japan?"],
        ['start' => 29.5, 'end' => 35, 'text' => "It's better than summer because it's cooler. The air is fresh and it's often quite windy."],
        ['start' => 35.5, 'end' => 37, 'text' => "And how about winter?"],
        ['start' => 37.5, 'end' => 41.8, 'text' => 'Winter is really cold and very dry. In the northern parts of Japan.'],
        ['start' => 41.8, 'end' => 43, 'text' => 'There is often a lot of snow.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])