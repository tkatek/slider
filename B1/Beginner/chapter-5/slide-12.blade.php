<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Choose the right answer: correct or incorrect?',

    'questions' => [
        [
            'emoji'   => '☕🌅',
            'prompt'  => 'I drink coffee every morning.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🏋️‍♀️📅',
            'prompt'  => 'She is going to the gym every Monday.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '⚽⏰',
            'prompt'  => 'They are playing football right now.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '💼🌙',
            'prompt'  => 'He usually works late at night.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🌳📅',
            'prompt'  => 'I am going to the park every weekend.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🍳⏰',
            'prompt'  => 'We cook dinner at the moment.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🗣️💼',
            'prompt'  => 'She speaks English every day at work.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '👔💼',
            'prompt'  => 'He always is wearing a suit to work.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '📺⏰',
            'prompt'  => 'I am watching TV now.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '📚📅',
            'prompt'  => 'They are studying at the library on Fridays.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '💼🕘',
            'prompt'  => 'Do you go to work at 9 o’clock every day?',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🍽️🚫',
            'prompt'  => 'He is never eating breakfast.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🎾📅',
            'prompt'  => 'I play tennis on Sundays.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '👭📅',
            'prompt'  => 'She usually is meeting her friends on Saturdays.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🚌🌅',
            'prompt'  => 'We take the bus every morning.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🥗⏰',
            'prompt'  => 'Are you eating lunch right now?',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🛏️🌙',
            'prompt'  => 'They always are going to bed early.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '📖🌙',
            'prompt'  => 'I am reading a book every night before bed.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '🚶🏫',
            'prompt'  => 'He is walking to school today.',
            'correct' => 'Correct',
            'options' => ['Correct', 'Incorrect']
        ],
        [
            'emoji'   => '✏️🌙',
            'prompt'  => 'I am doing my homework every evening.',
            'correct' => 'Incorrect',
            'options' => ['Correct', 'Incorrect']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])