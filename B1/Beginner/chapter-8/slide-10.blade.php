<?php
$content = [
    'title'    => 'Listening: Practice 3',
    'subtitle' => 'Listen to Emma, Louise and Duncan talking about what they would do if they were millionaires.
    <br>For questions 1 to 5, choose the correct answer.',
    'type' => 'questions_only',
    'audio' => materialAsset('slider/B1/Beginner/chapter-8/audios/slide10.mp3'),

    'script' => [
        'Speaker 1: Emma',
        "If I had a million pounds, I'd buy a big house in the countryside.",
        "I'd decorate it nicely and hire a cleaner and a gardener.",
        "I'd also buy a new car, a dog, and some horses.",
        'I would still work because I enjoy my job.',

        'Speaker 2: Louise',
        "If I had a million pounds, I'd quit my university course because I don't enjoy it.",
        "I'd study something creative, like fashion design.",
        "I'd open a small studio and work with creative people.",
        "I'd save some money for the future too.",

        'Speaker 3: Duncan',
        "If I had a million pounds, I'd travel around the world.",
        "I'd visit Africa and Asia and learn new skills.",
        "Then I'd buy a house and a car.",
        "After that, I'd give some of the money to charity and live a normal life.",
    ],

    'questions' => [
        [
            'prompt'  => 'What would Emma buy if she had a million pounds?',
            'correct' => 'A big house in the countryside',
            'options' => [
                'A studio',
                'A boat',
                'A big house in the countryside',
                'A restaurant',
            ],
        ],
        [
            'prompt'  => 'Why would Emma continue working?',
            'correct' => 'Because she enjoys her job',
            'options' => [
                'Because she wants to travel',
                'Because she enjoys her job',
                'Because she needs a new car',
                'Because she wants to study',
            ],
        ],
        [
            'prompt'  => 'What would Louise study if she had a million pounds?',
            'correct' => 'Fashion design',
            'options' => [
                'Finance',
                'Medicine',
                'Engineering',
                'Fashion design',
            ],
        ],
        [
            'prompt'  => 'What would Louise do with some of her money?',
            'correct' => 'Save it for the future',
            'options' => [
                'Buy a farm',
                'Save it for the future',
                'Buy horses',
                'Travel around the world',
            ],
        ],
        [
            'prompt'  => 'What would Duncan do first if he had a million pounds?',
            'correct' => 'Travel around the world',
            'options' => [
                'Buy a house',
                'Buy a car',
                'Travel around the world',
                'Open a studio',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])