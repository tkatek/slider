<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 6',
    'subtitle' => 'Speaking Time',

    'questions' => [
        [
            'emoji' => '📅🛎️',
            'prompt' => 'Do you have a _________ ?',
            'correct' => 'reservation',
            'options' => ['date', 'reservation', 'stay']
        ],
        [
            'emoji' => '🍳☕',
            'prompt' => 'Is breakfast ______?',
            'correct' => 'included',
            'options' => ['fill in', 'accommodation', 'included']
        ],
        [
            'emoji' => '❄️🛏️',
            'prompt' => 'Does the room have ______?',
            'correct' => 'air-conditioning',
            'options' => ['air-conditioning', 'bellboy', 'valet']
        ],
        [
            'emoji' => '🏨🪜',
            'prompt' => 'There is a restaurant on the ground ____.',
            'correct' => 'floor',
            'options' => ['lift', 'floor', 'car park']
        ],
        [
            'emoji' => '🛏️🛏️',
            'prompt' => 'Two people sleep in a ______ room at a hotel.',
            'correct' => 'DOUBLE',
            'options' => ['SINGLE', 'DOUBLE', 'TWO']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])