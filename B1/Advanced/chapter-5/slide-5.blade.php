<?php

$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Advanced/chapter-5/img/slide5.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'Why is it more important than ever to protect the environment?',
            'options' => [
                'Because people want cleaner cities.',
                'Because of climate change and other environmental threats.',
                'Because renewable energy is expensive.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 26000,
            'type' => 'multiple_choice',
            'question' => 'Which of the following is mentioned as an environmental problem?',
            'options' => [
                'Traffic jams',
                'Plastic waste in the oceans.',
                'Lack of public transportation',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 52000,
            'type' => 'multiple_choice',
            'question' => 'According to the speaker, what is one of the most effective ways to reduce our impact on the environment?',
            'options' => [
                'Buying more electronic devices',
                'Changing our transportation habits.',
                'Driving longer distances',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 72000,
            'type' => 'multiple_choice',
            'question' => 'Which energy sources are recommended in the video?',
            'options' => [
                'Fossil fuels',
                'Nuclear energy',
                'Solar and wind energy.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 92000,
            'type' => 'multiple_choice',
            'question' => 'What is the main message of the video?',
            'options' => [
                'Only governments can solve environmental problems.',
                'Small actions by everyone can help protect the planet.',
                'Climate change cannot be stopped.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end'   => 8,
            'text'  => 'The environment we live in is a precious resource that we often take for granted.',
        ],
        [
            'start' => 8,
            'end'   => 16,
            'text'  => "With climate change and other environmental threats, it's more important than ever to take action to protect our planet.",
        ],
        [
            'start' => 16,
            'end'   => 25,
            'text'  => 'The impact of human activity on the environment is visible all around us, from air pollution in our cities to plastic waste in our oceans.',
        ],
        [
            'start' => 25,
            'end'   => 31,
            'text'  => 'We need to take steps to reduce our impact on the planet.',
        ],
        [
            'start' => 31,
            'end'   => 38,
            'text'  => 'Every little action counts, and we can all do our part to help protect the environment.',
        ],
        [
            'start' => 38,
            'end'   => 48,
            'text'  => "Whether it's picking up litter, reducing our energy consumption, or using environmentally friendly products, we can all make a difference.",
        ],
        [
            'start' => 48,
            'end'   => 57,
            'text'  => 'One of the most effective ways to reduce our impact on the environment is to change our transportation habits.',
        ],
        [
            'start' => 57,
            'end'   => 66,
            'text'  => 'By walking, biking, or taking public transportation, we can reduce our carbon footprint and help keep the air clean.',
        ],
        [
            'start' => 66,
            'end'   => 74,
            'text'  => 'Another way to make a difference is to switch to renewable energy sources.',
        ],
        [
            'start' => 74,
            'end'   => 84,
            'text'  => 'Solar panels, wind turbines, and other clean energy sources can help reduce our reliance on fossil fuels and combat climate change.',
        ],
        [
            'start' => 84,
            'end'   => 91,
            'text'  => "Remember, we all share this planet, and it's up to us to protect it for future generations.",
        ],
        [
            'start' => 91,
            'end'   => 98,
            'text'  => "Let's work together to create a more sustainable and environmentally friendly world.",
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])