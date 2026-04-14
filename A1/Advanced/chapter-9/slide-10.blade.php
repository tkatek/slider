<?php
$content = [
    'title'    => 'Practice 6',
    'subtitle' => '4️⃣ Places in a town: Odd one out',
    'type'     => 'audio',

    'questions' => [
        [
            'prompt'  => 'Which place can you eat or drink?',
            'correct' => 'Café',
            'options' => [
                'Café',
                'Cinema',
                'Library',
                'Supermarket',
            ],
        ],
        [
            'prompt'  => 'Which place do people normally stay in for less than an hour?',
            'correct' => 'Bank',
            'options' => [
                'Bank',
                'Bus stop',
                'Cinema',
                'Post office',
            ],
        ],
        [
            'prompt'  => 'Which place is for learning?',
            'correct' => 'School',
            'options' => [
                'Library',
                'School',
                'Sports centre',
                'Train station',
            ],
        ],
        [
            'prompt'  => 'Which place is open to the public?',
            'correct' => 'Post office',
            'options' => [
                'Bus stop',
                'Factory',
                'Post office',
                'Train station',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])