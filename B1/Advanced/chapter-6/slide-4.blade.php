<?php

$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Advanced/chapter-6/img/slide4.webp'),
    'isQuiz'    => 0,

    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'What are some of the major problems our planet is facing?',
            'options' => [
                'Only climate change and pollution.',
                'Deforestation and human health.',
                'Climate change, loss of biodiversity, deforestation, and pollution.',
                'Air pollution and water pollution only.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => 'What can we do to save energy according to the text?',
            'options' => [
                'Use more air conditioning and heating.',
                'Leave lights on all the time.',
                'Use energy-efficient appliances and turn off lights when not needed.',
                'Use more electricity during the day.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 47000,
            'type' => 'multiple_choice',
            'question' => 'How does using public transportation, biking, or walking help the environment?',
            'options' => [
                'It increases carbon emissions.',
                'It damages ecosystems.',
                'It makes the air cleaner and reduces carbon emissions.',
                'It uses more fossil fuels.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 62000,
            'type' => 'multiple_choice',
            'question' => 'Why should we support renewable energy?',
            'options' => [
                'To increase our reliance on fossil fuels.',
                'To reduce our reliance on fossil fuels.',
                'Because it is cheaper.',
                'Because it is more expensive.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 76000,
            'type' => 'multiple_choice',
            'question' => 'What does planting trees do?',
            'options' => [
                'It increases carbon dioxide in the air.',
                'It cuts down forests.',
                'It absorbs carbon dioxide and keeps ecosystems healthy.',
                'It pollutes the environment.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end'   => 5,
            'text'  => 'Saving Our Planet',
        ],
        [
            'start' => 5,
            'end'   => 16,
            'text'  => 'Our planet is facing several major problems, including climate change, loss of biodiversity, deforestation, and pollution.',
        ],
        [
            'start' => 16,
            'end'   => 25,
            'text'  => 'These issues threaten wildlife, damage ecosystems, and affect human health.',
        ],
        [
            'start' => 25,
            'end'   => 33,
            'text'  => 'Protecting our planet requires collective action from individuals, governments, and organizations.',
        ],
        [
            'start' => 33,
            'end'   => 38,
            'text'  => 'Here are six simple ways we can help.',
        ],
        [
            'start' => 38,
            'end'   => 45,
            'text'  => 'First, reduce, reuse, and recycle.',
        ],
        [
            'start' => 45,
            'end'   => 53,
            'text'  => 'Reduce the amount of waste you produce by reusing and recycling items whenever possible.',
        ],
        [
            'start' => 53,
            'end'   => 60,
            'text'  => 'Second, conserve energy.',
        ],
        [
            'start' => 60,
            'end'   => 70,
            'text'  => 'Save energy by using energy-efficient appliances, turning off lights when they are not needed, and using less air conditioning and heating.',
        ],
        [
            'start' => 70,
            'end'   => 77,
            'text'  => 'Third, use public transportation, bike, or walk.',
        ],
        [
            'start' => 77,
            'end'   => 87,
            'text'  => 'Travel by bus, bike, or on foot instead of driving whenever possible. This helps reduce carbon emissions and keeps the air cleaner.',
        ],
        [
            'start' => 87,
            'end'   => 94,
            'text'  => 'Fourth, support renewable energy.',
        ],
        [
            'start' => 94,
            'end'   => 103,
            'text'  => 'Choose renewable energy sources, such as solar and wind power, to reduce our reliance on fossil fuels.',
        ],
        [
            'start' => 103,
            'end'   => 110,
            'text'  => 'Fifth, plant trees and protect nature.',
        ],
        [
            'start' => 110,
            'end'   => 120,
            'text'  => 'Planting trees helps absorb carbon dioxide, while protecting forests and wildlife habitats keeps ecosystems healthy.',
        ],
        [
            'start' => 120,
            'end'   => 127,
            'text'  => 'Sixth, educate and raise awareness.',
        ],
        [
            'start' => 127,
            'end'   => 136,
            'text'  => 'Share what you know about environmental protection and encourage others to take action.',
        ],
        [
            'start' => 136,
            'end'   => 148,
            'text'  => 'By making these simple changes, we can all reduce our impact on the environment and help create a cleaner, greener, and more sustainable future.',
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])