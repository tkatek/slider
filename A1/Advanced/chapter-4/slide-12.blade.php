<?php
$content = [
    'type' => 'emoji',
    'title' => 'Practice 4',
    'subtitle' => '',

    'questions' => [
        [
            'emoji'   => '🙋‍🎓',
            'prompt'  => 'I _____ a student.',
            'correct' => 'am',
            'options' => ['is', 'isn\'t', 'am', 'are'],
        ],
        [
            'emoji'   => '👫🗺️',
            'prompt'  => 'We _____ from Spain.',
            'correct' => 'are',
            'options' => ['is', 'are', 'isn\'t', 'am not'],
        ],
        [
            'emoji'   => '👩‍⚕️🩺',
            'prompt'  => 'Mrs. Parker _____ a doctor.',
            'correct' => 'is',
            'options' => ['is', 'are', 'am', 'aren\'t'],
        ],
        [
            'emoji'   => '🎤🎶',
            'prompt'  => '_____ they singers?',
            'correct' => 'Are',
            'options' => ['Is', 'Isn\'t', 'Are', 'Am'],
        ],
        [
            'emoji'   => '👩🎭',
            'prompt'  => 'She _____ an actress.',
            'correct' => 'is',
            'options' => ['are', 'isn\'t', 'are not', 'is'],
        ],
        [
            'emoji'   => '👮‍♀️🎂',
            'prompt'  => 'The policewoman _____ old.',
            'correct' => 'isn\'t',
            'options' => ['am', 'aren\'t', 'are', 'isn\'t'],
        ],
        [
            'emoji'   => '🙋‍♂️🚫',
            'prompt'  => 'I _____ a boy.',
            'correct' => 'am not',
            'options' => ['am not', 'isn\'t', 'aren\'t', 'is'],
        ],
        [
            'emoji'   => '👩‍🏫🌎',
            'prompt'  => '_____ your teacher from the United States?',
            'correct' => 'Is',
            'options' => ['Am', 'Is', 'Are', 'Be'],
        ],
        [
            'emoji'   => '👨📍',
            'prompt'  => 'Paul _____ from England.',
            'correct' => 'is',
            'options' => ['aren\'t', 'am', 'am not', 'is'],
        ],
        [
            'emoji'   => '👬🏠',
            'prompt'  => 'Your friends _____ at home.',
            'correct' => 'aren\'t',
            'options' => ['be', 'is', 'isn\'t', 'aren\'t'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])