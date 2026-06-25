<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 7',
    'subtitle' => 'Choose the correct answer.',

    'questions' => [
        [
            'emoji' => '📢🚌',
            'prompt' => 'Advertisements .......... on buses, billboards, websites, and television.',
            'correct' => 'are seen',
            'options' => ['see', 'are seen', 'is seen', 'sees'],
        ],
        [
            'emoji' => '🏢📱',
            'prompt' => 'Companies .......... products through social media and search engines.',
            'correct' => 'advertise',
            'options' => ['advertise', 'is advertised', 'are advertise', 'advertising'],
        ],
        [
            'emoji' => '🔁💡',
            'prompt' => 'Products .......... more memorable through repetition.',
            'correct' => 'are made',
            'options' => ['make', 'are made', 'is made', 'makes'],
        ],
        [
            'emoji' => '❤️🛒',
            'prompt' => 'Customers .......... by advertisers using emotional appeal.',
            'correct' => 'are persuaded',
            'options' => ['persuade', 'is persuaded', 'are persuaded', 'persuades'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])