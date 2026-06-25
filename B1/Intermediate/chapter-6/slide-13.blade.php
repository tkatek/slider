<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 6',
    'subtitle' => 'Choose the correct answer.',

    'questions' => [
        [
            'emoji' => '🥞',
            'prompt' => 'Pancakes .......... with sour cream.',
            'correct' => 'are served',
            'options' => ['serve', 'are served', 'is served', 'served'],
        ],
        [
            'emoji' => '🥔',
            'prompt' => 'You .......... draniki with a lot of sour cream.',
            'correct' => 'eat',
            'options' => ['are eaten', 'is eaten', 'eat', 'are eat'],
        ],
        [
            'emoji' => '🍅',
            'prompt' => 'Tomatoes .......... in India.',
            'correct' => 'are grown',
            'options' => ['are grown', 'is grown', 'grow', 'grown'],
        ],
        [
            'emoji' => '🍕',
            'prompt' => 'Pizza .......... all over the world.',
            'correct' => 'is made',
            'options' => ['made', 'are made', 'is made', 'makes'],
        ],
        [
            'emoji' => '👩‍🍳',
            'prompt' => 'My sister .......... pizza with tomato sauce and grated cheese.',
            'correct' => 'makes',
            'options' => ['make', 'makes', 'is made', 'are made'],
        ],
        [
            'emoji' => '🍓',
            'prompt' => 'Juice .......... with straberries.',
            'correct' => 'is made',
            'options' => ['makes', 'is made', 'are made', 'made'],
        ],
        [
            'emoji' => '🌍',
            'prompt' => 'English .......... all over the world.',
            'correct' => 'is taught',
            'options' => ['taught', 'are taught', 'is taught', 'teaches'],
        ],
        [
            'emoji' => '⚽',
            'prompt' => 'Football .......... in Belarus.',
            'correct' => 'is played',
            'options' => ['are played', 'plays', 'is played', 'play'],
        ],
        [
            'emoji' => '🏫',
            'prompt' => 'We .......... at school.',
            'correct' => "don't sing",
            'options' => ["aren't sing", "aren't sung", "don't sing", "doesn't sing"],
        ],
        [
            'emoji' => '💇‍♀️',
            'prompt' => 'Mary .......... her hair every day.',
            'correct' => 'washes',
            'options' => ['washes', 'wash', 'is washed', 'are wash'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])