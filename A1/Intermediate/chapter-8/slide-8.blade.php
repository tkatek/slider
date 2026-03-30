<?php
$content = [
    'uid' => 'practice_' . substr(md5(uniqid('', true)), 0, 10),
    'type' => 'emoji',
    'title'    => 'Let’s do this quiz',
    'subtitle' => 'Choose the correct answer between the options',

    'questions'=> [
        [
            'emoji'   => '✈️',
            'prompt'  => 'I’d like some information about holiday tours.',
            'correct' => 'Sure',
            'options' => ['Sure', 'Sorry', 'Welcome']
        ],
        [
            'emoji'   => '🌍',
            'prompt'  => 'Where would you like to travel?',
            'correct' => 'I’m thinking about London',
            'options' => ['A city tour, please', 'I’m thinking about London', 'Certainly']
        ],
        [
            'emoji'   => '🏨',
            'prompt'  => 'The package holiday includes hotels, transfers, and excursions.',
            'correct' => 'Perfect',
            'options' => ['By credit card', 'No problem', 'Perfect']
        ],
        [
            'emoji'   => '✈️️️',
            'prompt'  => 'I’m thinking about Italy.',
            'correct' => 'Great choice',
            'options' => ['A city tour, please', 'Yes, breakfast is included', 'Great choice']
        ],
        [
            'emoji'   => '📅',
            'prompt'  => 'The next group leaves in June. What’s the question?',
            'correct' => 'When is it available?',
            'options' => [
                'Where would you like to travel?',
                'Do you prefer a city tour or a beach holiday?',
                'When is it available?'
            ]
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])