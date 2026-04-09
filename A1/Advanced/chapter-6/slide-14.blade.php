<?php
$content = [
    'title'  => 'Practice 6',
    'type'   => 'audio',
    'subtitle' => 'The Train Station Announcement',
    'audio'  => materialAsset('slider/A1/Advanced/chapter-6/audios/slide14.mp3'),

    'status_row_width' => 'max-w-4xl',
    'game_card_width'  => 'max-w-4xl',

    'script' => [
        'Good afternoon, passengers. We have important news. The 2:30 train to London has been canceled. We are sorry. One of the train drivers is sick and cannot come to work today. The next train to London will arrive at 3:15. It will leave from Platform 5, not Platform 4. Please go to Platform 5 for the London train. The train to Manchester will arrive at 3:00 on Platform 2. Tomorrow is Easter Sunday. There are no trains before 10:00 AM. The first train will leave at 10:15 from Platform 1. Please check the schedule for more information about Easter service. Thank you for your understanding.'
    ],

    'questions' => [
        [
            'prompt'  => 'The 2:30 train to London is canceled.',
            'correct' => 'True',
            'options' => ['True', 'False']
        ],
        [
            'prompt'  => 'The next train to London will leave from Platform 4.',
            'correct' => 'False',
            'options' => ['True', 'False']
        ],
        [
            'prompt'  => 'The Manchester train arrives at 3:00 on Platform 2.',
            'correct' => 'True',
            'options' => ['True', 'False']
        ],
        [
            'prompt'  => 'Tomorrow is Easter Sunday, and the first train will leave at 8:00 AM.',
            'correct' => 'False',
            'options' => ['True', 'False']
        ],
        [
            'prompt'  => 'The first train on Easter Sunday will leave from Platform 1.',
            'correct' => 'True',
            'options' => ['True', 'False']
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])