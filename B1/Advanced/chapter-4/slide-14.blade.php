<?php

$content = [
    'mode' => 'choice_table',

    'title'      => 'Listening',
    'subtitle'   => '',

    'instruction' => 'People are talking about issues',
    'instruction_note' => 'Which issue do they think is most important right now? Listen and circle the correct answer',

    'audio' => materialAsset('slider/B1/Advanced/chapter-4/audios/slide14.mp3'),

    'transcript' => [

        'Well, the government has done quite a bit to reduce water pollution. It’s certainly better than it used to be. Now we have to do something about air pollution, which is still pretty bad.',

        'Crime is a growing problem in the country right now. Sometimes it’s because people are unemployed. I think what we really have to do is reduce unemployment. That should help the crime problem.',

        'The subway and bus services have definitely got to improve. But the government should really focus on improving conditions for people in the cities. So many people need better places to live and the problem is getting worse.',

        'One of the biggest issues we’re facing right now is unemployment. If people can’t work, they can’t spend any money, and then the whole economy continues to suffer. The government really needs to help create more jobs.',

        'Parking downtown is so expensive, and there’s so much traffic on the streets in the morning with so many people trying to get to work. We need a new subway system to make it easier for people to get to work so we don’t have to drive our cars all the time.',

        'There has been an increase in life span throughout the world. People live longer now because of the availability of medicine and clean water. We need to make sure this continues.',
    ],

    'row_heading'    => 'Number',
    'option_heading' => 'Choose the issue',

    'rows' => [
        [
            'number'  => 1,
            'correct' => 'b. air pollution',
            'options' => [
                'a. water pollution',
                'b. air pollution',
            ],
        ],
        [
            'number'  => 2,
            'correct' => 'b. crime',
            'options' => [
                'a. unemployment',
                'b. crime',
            ],
        ],
        [
            'number'  => 3,
            'correct' => 'b. housing',
            'options' => [
                'a. public transportation',
                'b. housing',
            ],
        ],
        [
            'number'  => 4,
            'correct' => 'b. unemployment',
            'options' => [
                'a. government',
                'b. unemployment',
            ],
        ],
        [
            'number'  => 5,
            'correct' => 'a. public transportation',
            'options' => [
                'a. public transportation',
                'b. unemployment',
            ],
        ],
        [
            'number'  => 6,
            'correct' => 'b. health',
            'options' => [
                'a. education',
                'b. health',
            ],
        ],
    ],
];

?>

@include('slider.game.listening-table', ['content' => $content])