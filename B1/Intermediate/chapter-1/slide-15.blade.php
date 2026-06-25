<?php

$content = [

    'type'       => 'emoji',
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Choose the correct option to complete the sentences.',

    'game_card_width' => 'max-w-5xl',

    'questions' => [
        [
            'emoji'   => '🏠',
            'prompt'  => "The house isn't hard to find. It's the red one at the end. You . . . . . . . miss it!",
            'correct' => "can't",
            'options' => ['must', 'might', "can't"],
        ],
        [
            'emoji'   => '📸',
            'prompt'  => 'What an amazing trip! You . . . . . . . have some incredible photos.',
            'correct' => 'must',
            'options' => ['must', 'might', "can't"],
        ],
        [
            'emoji'   => '🍗',
            'prompt'  => "That . . . . . . . be the vegetarian option. It's got chicken in it.",
            'correct' => "can't",
            'options' => ['must', 'may not', "can't"],
        ],
        [
            'emoji'   => '🛂',
            'prompt'  => "Have you got your passport? I'm not sure if you'll need it but they . . . . . . . ask you for ID.",
            'correct' => 'might',
            'options' => ["can't", 'might', 'must'],
        ],
        [
            'emoji'   => '💻',
            'prompt'  => "Who left their laptop on my desk? It . . . . . . . be Mel's – she's working at home today.",
            'correct' => "can't",
            'options' => ['must', 'could', "can't"],
        ],
        [
            'emoji'   => '🤒',
            'prompt'  => "Samira has flu. We don't know yet but she . . . . . . . need to take the whole week off.",
            'correct' => 'may',
            'options' => ['must', "can't", 'may'],
        ],
        [
            'emoji'   => '⌚',
            'prompt'  => 'Your watch says a different time from mine. One of them . . . . . . . be wrong.',
            'correct' => 'must',
            'options' => ['must', 'could', 'may'],
        ],
        [
            'emoji'   => '🦅',
            'prompt'  => "Look at that bird! Maybe it's an eagle or it . . . . . . . be a vulture.",
            'correct' => 'could',
            'options' => ['must', 'could', "can't"],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])