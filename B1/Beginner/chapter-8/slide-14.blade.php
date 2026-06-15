<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read the passage & answer the questions',

    'reading_title'   => 'If I Won the Lottery',

    'passage' => [
        "I often imagine what my life would be like if I won the lottery.",
        "First, I would buy a big house in the country and a new car. I might also buy a motorcycle because I enjoy riding them.",
        "I would give some money to charity and help friends who need financial support. I would also save some money in the bank.",
        "Another thing I would do is open a restaurant because I love cooking and have always wanted to own one.",
        "However, I would not spend my money on travelling. I know someone who spent all her lottery winnings on trips and had nothing left afterwards.",
        "The only problem is that I have never played the lottery before. As people say, \"You can't win if you don't play!\"",
    ],

    'questions' => [
        [
            'prompt'  => 'What is the first thing the writer would buy if they won the lottery?',
            'correct' => 'A big house',
            'options' => [
                'A restaurant',
                'A motorcycle',
                'A big house',
                'A bank',
            ],
        ],
        [
            'prompt'  => 'What vehicle does the writer want to buy?',
            'correct' => 'A motorcycle',
            'options' => [
                'A truck',
                'A motorcycle',
                'A bicycle',
                'A boat',
            ],
        ],
        [
            'prompt'  => 'Who would the writer help with the lottery money?',
            'correct' => 'Friends who need help',
            'options' => [
                'Famous people',
                'Teachers',
                'Friends who need help',
                'Neighbors only',
            ],
        ],
        [
            'prompt'  => 'What business would the writer like to open?',
            'correct' => 'A restaurant',
            'options' => [
                'A hotel',
                'A clothing store',
                'A restaurant',
                'A supermarket',
            ],
        ],
        [
            'prompt'  => 'Why would the writer not spend money on travelling?',
            'correct' => 'They know someone who spent all her winnings on travel.',
            'options' => [
                'They dislike travelling.',
                'They are afraid of flying.',
                'They know someone who spent all her winnings on travel.',
                'They prefer staying at home.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])