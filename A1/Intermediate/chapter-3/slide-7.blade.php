<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Practice 2',
    'subtitle' => 'Choose the best answer',

    'questions'=> [
        [
            'emoji'   => '🏀',
            'prompt'  => 'Which school area is specifically designed for physical education and sports activities?',
            'correct' => 'Gym for physical education and sports',
            'options' => [
                'Playground for reading and studying',
                'Gym for physical education and sports',
                'Library for eating meals with friends'
            ]
        ],
        [
            'emoji'   => '🍽️',
            'prompt'  => 'Which area in a school is primarily used for students to eat meals and socialize with friends?',
            'correct' => 'Cafeteria',
            'options' => [
                'Library',
                'Auditorium',
                'Cafeteria'
            ]
        ],
        [
            'emoji'   => '📚',
            'prompt'  => 'Where can students find a quiet place to read and borrow books at school?',
            'correct' => 'Library',
            'options' => [
                'Library',
                'Cafeteria',
                'Gym'
            ]
        ],
        [
            'emoji'   => '🎭',
            'prompt'  => 'Where is the primary location for school assemblies and presentations?',
            'correct' => 'Auditorium',
            'options' => [
                'Auditorium',
                'Art Room',
                'Science Lab'
            ]
        ],
        [
            'emoji'   => '🎭',
            'prompt'  => 'Which function best describes an auditorium?',
            'correct' => 'Hosting events',
            'options' => [
                'Hosting events',
                'Storing tools',
                'Selling food',
                'Parking vehicles',
            ]
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
