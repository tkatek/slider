<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 7',
    'subtitle' => 'Present perfect or past simple?!',

    'questions' => [
        [
            'emoji' => '🌍',
            'prompt' => 'I .......... (visit) Paris last summer.',
            'correct' => 'visited',
            'options' => ['visit', 'visited', 'have visited'],
        ],
        [
            'emoji' => '🍣',
            'prompt' => 'She .......... (eat) sushi three times this week.',
            'correct' => 'has eaten',
            'options' => ['eat', 'ate', 'has eaten'],
        ],
        [
            'emoji' => '🎬',
            'prompt' => 'We .......... (not, see) that movie yet.',
            'correct' => "haven't seen",
            'options' => ['see', "haven't seen", 'saw'],
        ],
        [
            'emoji' => '🍽️',
            'prompt' => 'I .......... (cook) dinner last night.',
            'correct' => 'cooked',
            'options' => ['cooked', 'cook', 'have cooked'],
        ],
        [
            'emoji' => '🎥',
            'prompt' => 'I .......... (see) that movie.',
            'correct' => 'have never seen',
            'options' => ['never see', 'never saw', 'have never seen'],
        ],
        [
            'emoji' => '🍿',
            'prompt' => 'They .......... (watch) a movie on Saturday.',
            'correct' => 'watched',
            'options' => ['have watched', 'watched', 'watch'],
        ],
        [
            'emoji' => '🏠',
            'prompt' => 'They .......... (live) here for five years.',
            'correct' => 'have lived',
            'options' => ['live', 'lived', 'have lived'],
        ],
        [
            'emoji' => '🎦',
            'prompt' => 'They .......... (go) to the cinema yesterday.',
            'correct' => 'went',
            'options' => ['went', 'have been', 'gone'],
        ],
        [
            'emoji' => '🧺',
            'prompt' => 'We .......... (do) the laundry already.',
            'correct' => 'have already done',
            'options' => ['already do', 'already did', 'have already done'],
        ],
        [
            'emoji' => '📚',
            'prompt' => 'I .......... (buy) a new book last week.',
            'correct' => 'bought',
            'options' => ['bought', 'have bought', 'buyed'],
        ],
        [
            'emoji' => '☕',
            'prompt' => 'I .......... (meet) Sarah at the coffee shop this morning.',
            'correct' => 'met',
            'options' => ['have met', 'met', 'meet'],
        ],
        [
            'emoji' => '🛋️',
            'prompt' => 'We .......... (stay) home all day yesterday.',
            'correct' => 'stayed',
            'options' => ['have stayed', 'stayed', 'stay'],
        ],
        [
            'emoji' => '📦',
            'prompt' => 'She .......... (move) to a new apartment last year.',
            'correct' => 'moved',
            'options' => ['moved', 'has moved', 'move'],
        ],
        [
            'emoji' => '🌍',
            'prompt' => 'We .......... (travel) to Italy many times.',
            'correct' => 'have travelled',
            'options' => ['travel', 'traveled', 'have travelled'],
        ],
        [
            'emoji' => '🏋️',
            'prompt' => 'I .......... (go) to the gym today.',
            'correct' => 'have been',
            'options' => ['have been', 'go', 'went'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])