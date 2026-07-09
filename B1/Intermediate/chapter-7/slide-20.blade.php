<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen again and answer the questions.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide18.mp3'),


    'script' => [
        'Georgie: Hi, Neil. How are you?',
        'Neil: I’m very good. I’m happy today.',
        'Georgie: Why?',
        'Neil: I’m going to a birthday party.',
        'Georgie: Whose birthday party?',
        'Neil: My sister’s.',
        'Georgie: Do you have siblings?',
        'Neil: Yes, I have one sister.',
        'Georgie: Is she older or younger?',
        'Neil: She is younger than me.',
        'Georgie: Are you similar?',
        'Neil: Not really. We look different, but we like some of the same things.',
        'Georgie: Are you close?',
        'Neil: We are close, but we don’t meet very often.',
        'Georgie: Why not?',
        'Neil: She lives in another city, and we are both busy.',
        'Georgie: How about you?',
        'Neil: When we meet, we get on well.',
        'Georgie: Do you wish you had more siblings?',
        'Neil: Maybe an older brother would be nice.',
        'Georgie: Why?',
        'Neil: An older brother can help and show you things.',
        'Georgie: I wish I had a brother too.',
        'Neil: Yes, siblings are important.',
    ],

    'questions' => [
        [
            'prompt'  => 'Why is Neil happy?',
            'correct' => 'He is going to a birthday party',
            'options' => [
                'He is going to school',
                'He is going to a birthday party',
                'He is going on holiday',
                'He is meeting Georgie',
            ],
        ],
        [
            'prompt'  => 'Who has a sister?',
            'correct' => 'Both Georgie and Neil',
            'options' => [
                'Georgie only',
                'Neil only',
                'Both Georgie and Neil',
                'Neither',
            ],
        ],
        [
            'prompt'  => 'Where does Neil’s sister live?',
            'correct' => 'In another city',
            'options' => [
                'In the same house',
                'In another city',
                'In another country',
                'In London',
            ],
        ],
        [
            'prompt'  => 'How often do Neil and his sister meet?',
            'correct' => 'Not very often',
            'options' => [
                'Every day',
                'Every week',
                'Very often',
                'Not very often',
            ],
        ],
        [
            'prompt'  => 'Neil has one sister.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Neil and his sister are very similar.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'They meet every day.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Neil thinks an older brother would be nice.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Neil is going to a ________ party.',
            'correct' => 'birthday',
            'options' => ['birthday', 'school', 'holiday', 'family'],
        ],
        [
            'prompt'  => 'He has one ________.',
            'correct' => 'sister',
            'options' => ['sister', 'brother', 'cousin', 'friend'],
        ],
        [
            'prompt'  => 'They are close, but they don’t meet very ________.',
            'correct' => 'often',
            'options' => ['often', 'quickly', 'slowly', 'late'],
        ],
        [
            'prompt'  => 'Neil wishes he had an older ________.',
            'correct' => 'brother',
            'options' => ['brother', 'sister', 'cousin', 'friend'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])