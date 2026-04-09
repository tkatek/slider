<?php
$content = [
    'type' => 'emoji',
    'title' => 'Practice 4',
    'subtitle' => '',

    'questions' => [
        [
            'emoji'   => '👩‍💼🏢',
            'prompt'  => 'She ..... at the office.',
            'correct' => 'works',
            'options' => ['play', 'work', "don't work", 'works']
        ],
        [
            'emoji'   => '👨‍🦱🚭',
            'prompt'  => 'My father ..... ....... cigarettes. (NOT)',
            'correct' => "doesn't smoke",
            'options' => ['smokes', 'play', "doesn't smoke", "don't smoke", "isn't smoke"]
        ],
        [
            'emoji'   => '🙋‍♂️🥩',
            'prompt'  => 'I .... .... meat. (NOT)',
            'correct' => "don't eat",
            'options' => ['work', "don't eat", 'eat', 'drinks', 'am not']
        ],
        [
            'emoji'   => '📚👦',
            'prompt'  => '...... Tom read a lot of books?',
            'correct' => 'Does',
            'options' => ['Is', 'Do', 'Does', "Doesn't"]
        ],
        [
            'emoji'   => '📻👂',
            'prompt'  => 'We ..... to the radio.',
            'correct' => 'listen',
            'options' => ['live', 'works', 'drink', 'listens', 'listen']
        ],
        [
            'emoji'   => '👫📍',
            'prompt'  => 'Alice and Mark .... ..... in London. (NOT)',
            'correct' => "don't live",
            'options' => ["isn't living", "doesn't live", "don't live", 'work']
        ],
        [
            'emoji'   => '🧒👧',
            'prompt'  => '...... children cook dinner?',
            'correct' => 'Do',
            'options' => ['Does', 'Do', 'Is', 'Are']
        ],
        [
            'emoji'   => '🎬🍿',
            'prompt'  => 'You ..... to the cinema at weekends.',
            'correct' => 'go',
            'options' => ['go', 'play', 'goes', 'plays']
        ],
        [
            'emoji'   => '⏰😕',
            'prompt'  => 'Why ...you late again?',
            'correct' => 'are',
            'options' => ['are', 'do', 'does', 'is']
        ],
        [
            'emoji'   => '👩⏰',
            'prompt'  => 'She ...never late.',
            'correct' => 'is',
            'options' => ['does', 'is', "don't", "doesn't"]
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])