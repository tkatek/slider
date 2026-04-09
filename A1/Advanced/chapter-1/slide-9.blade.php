<?php
$content = [

    'type' => 'emoji',
    'title'    => 'Practice 3',
    'subtitle' => '',

    'questions'=> [
        [
            'emoji'   => '🛎️',
            'prompt'  => 'I’d like to … .',
            'correct' => ['book a double room', 'make a reservation'],
            'options' => ['book a double room', 'make a reservation', 'a single room']
        ],
        [
            'emoji'   => '📅',
            'prompt'  => 'I have a reservation … .',
            'correct' => ['for two nights.', 'for a suite.'],
            'options' => ['for two nights.', 'double room.', 'for a suite.']
        ],
        [
            'emoji'   => '🍳',
            'prompt'  => 'Is … included in the price?',
            'correct' => ['the spa', 'breakfast'],
            'options' => ['the spa', 'a reservation', 'breakfast']
        ],
        [
            'emoji'   => '🏨',
            'prompt'  => 'What about … ?',
            'correct' => ['a single room', 'a room with a view'],
            'options' => ['make a reservation', 'a single room', 'a room with a view']
        ],
        [
            'emoji'   => '💵',
            'prompt'  => 'How much does … ?',
            'correct' => ['this room cost', 'this dish cost'],
            'options' => ['this room cost', 'fill out this form', 'this dish cost']
        ],
        [
            'emoji'   => '❓',
            'prompt'  => 'Can I … ?',
            'correct' => ['request a room'],
            'options' => ['request a room', 'asking you for help', 'breakfast']
        ],
        [
            'emoji'   => '📝',
            'prompt'  => 'Could you … ?',
            'correct' => ['pay by credit card', 'fill out the registration form'],
            'options' => ['pay by credit card', 'reserving a room', 'fill out the registration form']
        ],
        [
            'emoji'   => '🔑',
            'prompt'  => 'Would you like … ?',
            'correct' => ['to check in', 'to book a room'],
            'options' => ['to check in', 'check out', 'to book a room']
        ],
        [
            'emoji'   => '🛏️',
            'prompt'  => 'Would you prefer … ?',
            'correct' => ['a double room or a suite', 'to pay by credit card or in cash'],
            'options' => ['a double room or a suite', 'to pay by credit card or in cash', 'pay by credit card or in cash']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])