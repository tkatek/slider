<?php
$content = [
    'type' => 'emoji',
    'title'    => 'Let’s do this quiz',
    'subtitle' => 'Choose the correct answer between the options',

    'questions'=> [
        [
            'emoji'   => '💰',
            'prompt'  => 'The amount of money you have in a bank is called ___.',
            'correct' => 'balance',
            'options' => ['balance', 'bank statement', 'bank transfer']
        ],
        [
            'emoji'   => '🔄',
            'prompt'  => 'When you move money from one bank to another, it is called ___.',
            'correct' => 'transfer',
            'options' => ['bank statement', 'withdraw', 'transfer']
        ],
        [
            'emoji'   => '🏧',
            'prompt'  => 'To take out money from your bank account is called ___.',
            'correct' => 'withdraw',
            'options' => ['deposit', 'transfer', 'withdraw']
        ],
        [
            'emoji'   => '📄',
            'prompt'  => 'A document to show how much money you have is a ___.',
            'correct' => 'bank statement',
            'options' => ['bank transfer', 'bank statement', 'withdraw']
        ],
        [
            'emoji'   => '🧾',
            'prompt'  => 'Money going in and out of a bank account is called a ___.',
            'correct' => 'transaction',
            'options' => ['deposit', 'withdraw', 'transaction']
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
