<?php

$content = [

    'type'       => 'emoji',
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Choose the correct answer.',

    'game_card_width' => 'max-w-5xl',

    'questions' => [
        [
            'emoji'   => '☁️🌧️',
            'prompt'  => 'Look at those clouds. I think it . . . . . . . rain.',
            'correct' => 'might',
            'options' => ['can', 'might', 'must'],
        ],
        [
            'emoji'   => '🤔❌',
            'prompt'  => 'This is impossible! It . . . . . . . the answer!',
            'correct' => "can't be",
            'options' => ["can't be", "mustn't be", 'may not be'],
        ],
        [
            'emoji'   => '🎉😊',
            'prompt'  => 'Well done! You . . . . . . . very pleased!',
            'correct' => 'must be',
            'options' => ['may be', 'must be', 'might be'],
        ],
        [
            'emoji'   => '👩❓',
            'prompt'  => "I've no idea where Jane is. She . . . . . . . anywhere!",
            'correct' => 'may be',
            'options' => ['may be', 'must be'],
        ],
        [
            'emoji'   => '⏰😟',
            'prompt'  => "I'm not sure. I . . . . . . . be able to get there in time.",
            'correct' => 'may not',
            'options' => ['must not', 'may not'],
        ],
        [
            'emoji'   => '🚲❌',
            'prompt'  => "That . . . . . . . David. He doesn't have a bike.",
            'correct' => "can't be",
            'options' => ["can't be", "mustn't be", 'may not be'],
        ],
        [
            'emoji'   => '🚶‍♀️🛣️',
            'prompt'  => "Lisa isn't here yet. She . . . . . . . on her way.",
            'correct' => 'must be',
            'options' => ['can be', 'must be'],
        ],
        [
            'emoji'   => '🚪📮',
            'prompt'  => "There's someone at the door. It . . . . . . . the postman.",
            'correct' => 'may be',
            'options' => ["mustn't be", 'may be'],
        ],
        [
            'emoji'   => '📄🌙',
            'prompt'  => 'Sorry, I . . . . . . . out tonight. I have to finish a report for tomorrow.',
            'correct' => "can't come",
            'options' => ["can't come", 'may not come'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])