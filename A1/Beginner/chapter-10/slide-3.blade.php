<?php
$content = [
    'title'    => 'Are you a bargain shopper?',
    'subtitle' => 'Listen to the audio to find out what a bargain shopper is....',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A1/Beginner/chapter-10/audios/rebecca.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Rebecca shops only when she’s in the mood.',
        'She likes comfortable clothes and low prices.',
        'She waits for sales before buying things.',
        'She saves money to buy what she loves.',
        'She does not shop online because she likes to try clothes on.',
    ],

    'questions' => [
        [
            'prompt'  => 'What does Rebecca enjoy when she shops?',
            'correct' => 'Low prices',
            'options' => [
                'High prices',
                'Low prices',
                'Shopping online',
            ],
        ],
        [
            'prompt'  => 'What does Rebecca wait for before buying things?',
            'correct' => 'Sales',
            'options' => [
                'Big crowds',
                'Sales',
                'New stores',
            ],
        ],
        [
            'prompt'  => 'Why does Rebecca avoid online shopping?',
            'correct' => 'She likes to try clothes on',
            'options' => [
                'She likes to try clothes on',
                'She doesn’t trust websites',
                'She prefers delivery',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
