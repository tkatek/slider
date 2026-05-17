<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen and Choose the Correct Answer<br>Undercooked Steak Surprise',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide10.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Customer: Excuse me, I ordered my steak medium, but it’s almost rare.',
        'Waiter: I apologize for that. Would you like me to have it cooked a bit more?',
        'Customer: Yes, I would appreciate that. Thank you.',
        'Waiter: No problem. I’ll take it back to the kitchen right away.',
        'Customer: Thanks. While you’re at it, could you also bring me some fresh fries?',
        'Waiter: Certainly, I’ll have everything sorted for you as quickly as possible.',
    ],

    'questions' => [
        [
            'prompt'  => 'How did the customer want the steak cooked?',
            'correct' => 'Medium',
            'options' => [
                'Rare',
                'Medium',
                'Well done',
            ],
        ],
        [
            'prompt'  => 'What was wrong with the steak?',
            'correct' => 'It was almost rare',
            'options' => [
                'It was cold',
                'It was burned',
                'It was almost rare',
            ],
        ],
        [
            'prompt'  => 'What did the waiter do?',
            'correct' => 'Apologized and offered help',
            'options' => [
                'Ignored the customer',
                'Apologized and offered help',
                'Changed the table',
            ],
        ],
        [
            'prompt'  => 'What else did the customer ask for?',
            'correct' => 'Fresh fries',
            'options' => [
                'Salad',
                'Soup',
                'Fresh fries',
            ],
        ],
        [
            'prompt'  => 'Where would the waiter take the steak?',
            'correct' => 'To the kitchen',
            'options' => [
                'To the manager',
                'To the kitchen',
                'To another customer',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])