<?php
$content = [
    'type'=>'emoji',

    'title'    => 'Warm-up',
    'subtitle' => 'Let’s do a quick warm-up first!',



    'questions' => [
        [
            'emoji' => '👔🤝',
            'prompt' => 'What is the formal way to greet someone?',
            'correct' => 'Good afternoon',
            'options' => ['Hey!', 'Wassup?', 'Good afternoon', "What's poppin'"]
        ],
        [
            'emoji' => '🙂💬',
            'prompt' => 'How do you respond when someone says; “How are you?”',
            'correct' => "I’m fine, thank you.",
            'options' => ["I’m fine, thank you.", 'See you later.', 'Goodbye.', 'I love you.']
        ],
        [
            'emoji' => '🤝✨',
            'prompt' => 'What do you say when you meet someone for the first time?',
            'correct' => 'Nice to meet you.',
            'options' => ['See you later.', 'Nice to meet you.', 'Good night.', 'Good afternoon.']
        ],
        [
            'emoji' => '🪪🗣️',
            'prompt' => 'What do you say to tell someone your name?',
            'correct' => 'My name is John.',
            'options' => ['I am called John.', 'This is John', 'My name is John.', 'You are John.']
        ],
        [
            'emoji' => '🌙👋',
            'prompt' => 'How would you greet someone in the evening?',
            'correct' => 'Good evening',
            'options' => ['Good morning.', 'Good night.', 'Good evening', 'Good afternoon']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
