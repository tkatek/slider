<?php
$content = [
    'title'    => 'Listen again',
    'subtitle' => 'Choose the correct answer',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide18.mp3'),


    'script' => [
        'Do you like shopping?',
        'Yes, I’m a shopaholic.',
        'What do you usually shop for?',
        'I usually shop for clothes. I’m a big fashion fan.',
        'Where do you go shopping?',
        'At some fashion boutiques in my neighborhood.',
        'Are there many shops in your neighborhood?',
        'Yes. My area is the city center, so I have many choices of where to shop.',
        'Do you spend much money on shopping?',
        'Yes and I’m usually broke at the end of the month.',
        'Do you usually shop online? What items?',
        'Yes, but not really often. I only buy furniture online.',
        'What’s the difference between shopping online and offline?',
        'Unlike shopping offline, you cannot try on the pieces of clothes or check the material when shopping online.',
    ],

    'questions' => [
        [
            'prompt'  => 'What happens to the speaker at the end of the month?',
            'correct' => 'They are usually broke',
            'options' => [
                'They save money',
                'They are usually broke',
                'They earn more money',
                'They stop shopping',
            ],
        ],
        [
            'prompt'  => 'What does the speaker buy online?',
            'correct' => 'Furniture',
            'options' => [
                'Clothes',
                'Furniture',
                'Food',
                'Books',
            ],
        ],
        [
            'prompt'  => 'How often does the speaker shop online?',
            'correct' => 'Not really often',
            'options' => [
                'Very often',
                'Every day',
                'Not really often',
                'Never',
            ],
        ],
        [
            'prompt'  => 'What is a disadvantage of online shopping mentioned in the dialogue?',
            'correct' => 'You cannot try on clothes or check material',
            'options' => [
                'It is expensive',
                'You cannot try on clothes or check material',
                'It takes too much time',
                'There are no products available',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])