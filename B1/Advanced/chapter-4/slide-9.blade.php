<?php

$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Advanced/chapter-4/img/slide9.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'What is climate change?',
            'options' => [
                'A short-term change in local weather',
                'A long-term shift in global weather patterns caused by human activities',
                'A natural cycle that happens every year',
                'The disappearance of all plant and animal species',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 25000,
            'type' => 'multiple_choice',
            'question' => 'What is the main cause of climate change mentioned in the video?',
            'options' => [
                'Deforestation',
                'The burning of fossil fuels',
                'Volcanic eruptions',
                'Solar flares',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 38000,
            'type' => 'multiple_choice',
            'question' => 'What do greenhouse gases do?',
            'options' => [
                'They cool down the Earth.',
                "They trap heat in the atmosphere and raise Earth's temperature.",
                'They cause rain to fall.',
                'They protect us from the sun.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 56000,
            'type' => 'multiple_choice',
            'question' => 'Which of the following is an impact of climate change?',
            'options' => [
                'More frequent and severe weather events',
                'Longer nights and shorter days',
                'More snow in all countries',
                'Stronger Wi-Fi connections',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 77000,
            'type' => 'multiple_choice',
            'question' => 'What can we do to help reduce the effects of climate change?',
            'options' => [
                'Use more fossil fuels',
                'Reduce our carbon footprint and support renewable energy',
                'Cut down more trees',
                'Ignore the problem and hope it goes away',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 70000,
            'type' => 'input',
            'question' => 'Sea levels are rising at an increasing rate, putting coastal communities and infrastructure ________ of flooding and erosion.',
            'accepted_answers' => 'at risk',
            'points' => 10,
        ],
        [
            'time' => 102000,
            'type' => 'input',
            'question' => "If we don't take action to reduce our greenhouse gas emissions, these impacts will only become more severe and ________.",
            'accepted_answers' => 'widespread',
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end'   => 6,
            'text'  => 'Hello everyone! In this video, we will be discussing climate change and how it is affecting our planet.',
        ],
        [
            'start' => 6,
            'end'   => 17,
            'text'  => 'Climate change is a long-term shift in global weather patterns caused by human activities, particularly the burning of fossil fuels.',
        ],
        [
            'start' => 17,
            'end'   => 27,
            'text'  => 'This releases large amounts of greenhouse gases into the atmosphere.',
        ],
        [
            'start' => 27,
            'end'   => 38,
            'text'  => "These greenhouse gases trap heat and cause the Earth's temperature to rise.",
        ],
        [
            'start' => 38,
            'end'   => 50,
            'text'  => 'This results in a range of negative impacts, such as more frequent and severe weather events, rising sea levels, and the extinction of species.',
        ],
        [
            'start' => 50,
            'end'   => 59,
            'text'  => 'The impacts of climate change are already being felt around the world.',
        ],
        [
            'start' => 59,
            'end'   => 70,
            'text'  => 'In some regions, extreme weather events like hurricanes, floods, and droughts are becoming more frequent and severe.',
        ],
        [
            'start' => 70,
            'end'   => 82,
            'text'  => 'Sea levels are rising at an increasing rate, putting coastal communities and infrastructure at risk of flooding and erosion.',
        ],
        [
            'start' => 82,
            'end'   => 94,
            'text'  => 'Many plant and animal species are struggling to adapt to the changing climate, which threatens the balance of entire ecosystems.',
        ],
        [
            'start' => 94,
            'end'   => 104,
            'text'  => "If we don't take action to reduce our greenhouse gas emissions and mitigate the effects of climate change, these impacts will only become more severe and widespread.",
        ],
        [
            'start' => 104,
            'end'   => 116,
            'text'  => "So, let's take action today by reducing our carbon footprint, supporting renewable energy, and advocating for policies that prioritize the health of our planet.",
        ],
        [
            'start' => 116,
            'end'   => 124,
            'text'  => 'Thanks for watching, and please share this video with your friends and family to help spread awareness about this important issue.',
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])