<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => 'Choose the correct form (active or passive)',

    'questions' => [
        [
            'emoji' => '🌍',
            'prompt' => 'Climate change .......... in this video.',
            'correct' => 'is being discussed',
            'options' => [
                'is discussed',
                'is being discussed',
            ],
        ],
        [
            'emoji' => '🏭',
            'prompt' => 'Greenhouse gases .......... into the atmosphere.',
            'correct' => 'are being released',
            'options' => [
                'are releasing',
                'are being released',
            ],
        ],
        [
            'emoji' => '🌡️',
            'prompt' => 'Heat .......... in the atmosphere.',
            'correct' => 'is being trapped',
            'options' => [
                'is trapping',
                'is being trapped',
            ],
        ],
        [
            'emoji' => '🏘️',
            'prompt' => 'Coastal communities .......... at risk.',
            'correct' => 'are being put',
            'options' => [
                'are putting',
                'are being put',
            ],
        ],
        [
            'emoji' => '✅',
            'prompt' => 'Action .......... to reduce emissions.',
            'correct' => 'is being taken',
            'options' => [
                'is taking',
                'is being taken',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])