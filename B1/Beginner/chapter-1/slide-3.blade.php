<?php

$content = [
    'title' => 'Warm up: Practice 1',
    'subtitle' => '"Do Me a Favour": Quick Student Survey<br>This is a survey, in which you have some questions for you to answer:',

    'questions' => [
        [
            'type' => 'scale_list',
            'question' => 'How likely are you to help in these situations?',
            'min' => 0,
            'max' => 10,
            'min_label' => 'Strongly disagree',
            'max_label' => 'Strongly agree',
            'items' => [
                'Drive a neighbour to the airport late at night.',
                'Lend a classmate a notebook before a test.',
                'Help a friend move furniture at the weekend.',
                'Watch a neighbour’s pet for one evening.',
            ],
        ],
        [
            'type' => 'choice',
            'question' => 'Which favour would feel easiest to agree to?',
            'options' => [
                'Lend a pen for class',
                'Share homework notes',
                'Give a ride to the station',
                'Help carry books',
            ],
        ],
        [
            'type' => 'rank',
            'question' => 'Rank these requests from easiest to hardest to say yes to',
            'options' => [
                'Stay after class for 10 minutes',
                'Give someone a lift',
                'Help with a small task',
                'Borrow a charger',
            ],
        ],
    ],
];

?>

@include('slider.game.survey', ['content' => $content])
