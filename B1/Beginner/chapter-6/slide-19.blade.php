<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice.8',
    'subtitle' => 'A. Choose the correct word.',

    'questions' => [
        [
            'emoji' => '🎲',
            'prompt' => 'We usually play . . . . . . . games when it rains.',
            'correct' => 'indoor',
            'options' => ['indoor', 'indoors'],
        ],
        [
            'emoji' => '🌳',
            'prompt' => "Let's go . . . . . . . and enjoy the fresh air.",
            'correct' => 'outdoors',
            'options' => ['outdoor', 'outdoors'],
        ],
        [
            'emoji' => '🥾',
            'prompt' => 'My sister enjoys . . . . . . . activities such as hiking and camping.',
            'correct' => 'outdoor',
            'options' => ['outdoor', 'outdoors'],
        ],
        [
            'emoji' => '☀️',
            'prompt' => "It is too hot outside, so let's stay . . . . . . .",
            'correct' => 'indoors',
            'options' => ['indoor', 'indoors'],
        ],
        [
            'emoji' => '🎵',
            'prompt' => 'They organized an . . . . . . . concert in the park.',
            'correct' => 'outdoor',
            'options' => ['outdoor', 'outdoors'],
        ],
        [
            'emoji' => '🧒',
            'prompt' => 'The children are playing . . . . . . . in the garden.',
            'correct' => 'outdoors',
            'options' => ['outdoor', 'outdoors'],
        ],
        [
            'emoji' => '🏊',
            'prompt' => 'We have an . . . . . . . swimming pool at our sports club.',
            'correct' => 'indoor',
            'options' => ['indoor', 'indoors'],
        ],
        [
            'emoji' => '⛈️',
            'prompt' => 'During the storm, everyone stayed . . . . . . .',
            'correct' => 'indoors',
            'options' => ['indoor', 'indoors'],
        ],
        [
            'emoji' => '🚴',
            'prompt' => 'I prefer . . . . . . . sports like cycling and rock climbing.',
            'correct' => 'outdoor',
            'options' => ['outdoor', 'outdoors'],
        ],
        [
            'emoji' => '❄️',
            'prompt' => 'On cold days, my family spends most of the time . . . . . . .',
            'correct' => 'indoors',
            'options' => ['indoor', 'indoors'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])