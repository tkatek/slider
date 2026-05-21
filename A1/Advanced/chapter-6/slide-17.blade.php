<?php
$content = [
    'title'  => 'Practice 8',
    'type'   => 'audio',
    'subtitle' => 'Listen carefully to the announcement. Choose the correct answer.',
    'audio'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide17.mp3'),

    'status_row_width' => 'max-w-4xl',
    'game_card_width'  => 'max-w-4xl',

    'script' => [
        'Attention, please. The train to Bangkok will leave from Platform 3 at 11 a.m. Please have your tickets ready. Thank you.'
    ],

    'questions' => [
        [
            'prompt'  => 'Where will the train to Bangkok leave from?',
            'correct' => 'Platform 3',
            'options' => ['Platform 1', 'Platform 3', 'Platform 2', 'Platform 4']
        ],
        [
            'prompt'  => 'What time will the train leave?',
            'correct' => '11 a.m.',
            'options' => ['10 a.m.', '11 a.m.', '12 p.m.', '1 p.m.']
        ],
        [
            'prompt'  => 'What should passengers have ready?',
            'correct' => 'their tickets',
            'options' => ['their money', 'their passports', 'their bags', 'their tickets']
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])