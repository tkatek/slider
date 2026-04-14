<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Practice 4',
    'subtitle' => '2️⃣ Places in town: Definitions',

    'questions' => [
        [
            'emoji' => '🏦💵',
            'prompt' => 'A place where you keep or get cash.',
            'correct' => 'Bank',
            'options' => ['Bank', 'Bus stop', 'School']
        ],
        [
            'emoji' => '📮✉️',
            'prompt' => 'A place where you send letters and parcels.',
            'correct' => 'Post office',
            'options' => ['Café', 'Cinema', 'Post office']
        ],
        [
            'emoji' => '🚌🚏',
            'prompt' => 'A place where you catch the bus.',
            'correct' => 'Bus stop',
            'options' => ['Bus stop', 'Cinema', 'Post office']
        ],
        [
            'emoji' => '📚🏛️',
            'prompt' => 'A place where you borrow books.',
            'correct' => 'Library',
            'options' => ['Factory', 'Library', 'Supermarket']
        ],
        [
            'emoji' => '🚆🚉',
            'prompt' => 'A place where you can catch a train.',
            'correct' => 'Train station',
            'options' => ['Bank', 'Castle', 'Train station']
        ],
        [
            'emoji' => '🏭⚙️',
            'prompt' => 'A place which makes things.',
            'correct' => 'Factory',
            'options' => ['Bus stop', 'Factory', 'Post office']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])