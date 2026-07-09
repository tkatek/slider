<?php
$content = [
    'title'    => 'Signs of an Open-minded Person',
    'subtitle' => 'Listen to a podcast about signs of open-mindedness.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide15.mp3'),

    'script' => [
        'Welcome to our podcast, All About Minds. Today, we are talking about open-mindedness.',
        'People often like to put things into simple categories, such as right or wrong, rich or poor, and boy or girl. This is called binary thinking. However, the world is much more complex than that.',
        'Being open-minded means listening to and considering opinions that are different from our own. It helps us understand others and build stronger relationships.',
        'So, what are some signs of an open-minded person?',
        'First, open-minded people look for evidence before forming strong opinions. They ask questions and check different sources of information.',
        'Second, they try to recognize their own biases and prejudices. This can be difficult because we naturally prefer ideas that match our own beliefs.',
        'Third, they listen carefully and respectfully to other people. Even when they disagree, they try to understand different viewpoints.',
        'Finally, open-minded people accept that they may not always be right. They understand that people come from different cultures, backgrounds, and experiences.',
        'Open-mindedness helps us learn from others and respect different perspectives. It can also reduce misunderstandings and help people work together.',
        'So, how open-minded are you? Think about it and see if you can practice being more open-minded every day.',
    ],

    'questions' => [
        [
            'prompt'  => 'What is binary thinking?',
            'correct' => 'Seeing only two sides of a situation',
            'options' => [
                'Thinking carefully',
                'Seeing only two sides of a situation',
                'Listening to everyone',
                'Changing your opinion',
            ],
        ],
        [
            'prompt'  => 'Open-minded people look for ______ before forming strong opinions.',
            'correct' => 'Evidence',
            'options' => [
                'Friends',
                'Evidence',
                'Traditions',
                'Rules',
            ],
        ],
        [
            'prompt'  => 'What do open-minded people do when they disagree?',
            'correct' => 'Listen respectfully',
            'options' => [
                'Ignore others',
                'Get angry',
                'Listen respectfully',
                'Leave immediately',
            ],
        ],
        [
            'prompt'  => 'Why might people have different opinions?',
            'correct' => 'They come from different backgrounds',
            'options' => [
                'They come from different backgrounds',
                'They read the same information',
                'They always agree',
                'They never listen',
            ],
        ],
        [
            'prompt'  => 'According to the podcast, open-minded people accept that:',
            'correct' => 'They may not always be right',
            'options' => [
                'They are always right',
                'They may not always be right',
                'Nobody is right',
                'Everyone agrees',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])