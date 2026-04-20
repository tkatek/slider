<?php
$content = [
    'title'         => 'Practice',
    'subtitle'      => 'Read the dialogue & fill in the missing word from the box',

    'questions'=> [
        [
            'img'     => '📷',
            'prompt'  => 'The part of the phone that takes photos.',
            'correct' => 'camera',
            'options' => ['processor', 'battery', 'camera', 'model'],
        ],
        [
            'img'     => '💰',
            'prompt'  => 'How much money the phone costs.',
            'correct' => 'price',
            'options' => ['storage', 'model', 'feature', 'price'],
        ],
        [
            'img'     => '📶',
            'prompt'  => 'The strength of the wireless internet connection.',
            'correct' => 'Wi-Fi signal',
            'options' => ['durability', 'Wi-Fi signal', 'screen', 'storage'],
        ],
        [
            'img'     => '🔋',
            'prompt'  => 'How long the phone can last without charging.',
            'correct' => 'battery',
            'options' => ['storage', 'model', 'feature', 'battery'],
        ],
        [
            'img'     => '📱',
            'prompt'  => 'The physical glass surface you touch and look at.',
            'correct' => 'screen',
            'options' => ['screen', 'camera', 'storage', 'model'],
        ],
        [
            'img'     => '📲',
            'prompt'  => 'A specific version or design of a phone.',
            'correct' => 'model',
            'options' => ['feature', 'price', 'camera', 'model'],
        ],
        [
            'img'     => '🧠',
            'prompt'  => 'The brain of the phone, which runs apps and processes data.',
            'correct' => 'processor',
            'options' => ['processor', 'storage', 'battery', 'camera'],
        ],
        [
            'img'     => '💾',
            'prompt'  => 'How much data (pics, apps, files) the phone can hold.',
            'correct' => 'storage',
            'options' => ['camera', 'storage', 'screen', 'processor'],
        ],
        [
            'img'     => '🛡️',
            'prompt'  => 'How well the phone can withstand drops or scratches.',
            'correct' => 'durability',
            'options' => ['price', 'battery', 'model', 'durability'],
        ],
        [
            'img'     => '⭐',
            'prompt'  => 'A special function or characteristic of the phone, like facial recognition or fast charging.',
            'correct' => 'feature',
            'options' => ['feature', 'camera', 'screen', 'battery'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])