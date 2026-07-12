<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => 'Choose the correct form of the verb to complete the sentence.',

    'questions' => [
        [
            'emoji' => '📋',
            'prompt' => 'Every Friday, David . . . . . . .  at City Car Care.',
            'correct' => 'has his car washed',
            'options' => [
                'has washed his car',
                'has his car washed',
                'washes his car',
                'had his car washed',
            ],
        ],
        [
            'emoji' => '🚗',
            'prompt' => 'Because it broke down yesterday, David . . . . . . .  at the repair shop.',
            'correct' => 'had his car repaired',
            'options' => [
                'had repaired his car',
                'has his car repaired',
                'had his car repaired',
                'repairs his car',
            ],
        ],
        [
            'emoji' => '🛢️',
            'prompt' => 'I never change the oil myself; I . . . . . . .  by a professional mechanic.',
            'correct' => 'have it done',
            'options' => [
                'have it done',
                'have done it',
                'had it done',
                'having it done',
            ],
        ],
        [
            'emoji' => '🏠',
            'prompt' => 'Last year, we . . . . . . .  completely remodeled by a local contractor.',
            'correct' => 'had our house',
            'options' => [
                'had our house',
                'have our house',
                'had our house been',
                'had our house done',
            ],
        ],
        [
            'emoji' => '🧹',
            'prompt' => 'Sarah hates cleaning, so she . . . . . . .  every two weeks.',
            'correct' => 'has her house cleaned',
            'options' => [
                'has cleaned her house',
                'has her house cleaned',
                'had her house cleaned',
                'cleans her house',
            ],
        ],
        [
            'emoji' => '🔑',
            'prompt' => 'I lost my house key, so I . . . . . . .  yesterday.',
            'correct' => 'had the locks changed',
            'options' => [
                'had changed the locks',
                'have changed the locks',
                'had the locks changed',
                'had the locks changing',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])