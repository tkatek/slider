<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => 'Choose the correct option to complete the sentences.',

    'questions' => [
        [
            'emoji' => '📚',
            'prompt' => 'When she . . . . . . . on the course, she had never studied a foreign language before.',
            'correct' => 'enrolled',
            'options' => ['enrolled', 'had enrolled'],
        ],
        [
            'emoji' => '🔑',
            'prompt' => 'When I closed the door, I realised that I . . . . . . . my keys inside.',
            'correct' => 'had left',
            'options' => ['left', 'had left'],
        ],
        [
            'emoji' => '😢',
            'prompt' => "She looked really sad but I didn't know what . . . . . . .",
            'correct' => 'had happened',
            'options' => ['happened', 'had happened'],
        ],
        [
            'emoji' => '🔔',
            'prompt' => '. . . . . . . . when you rang the doorbell?',
            'correct' => 'Had Sara already left',
            'options' => ['Did Sara already leave', 'Had Sara already left'],
        ],
        [
            'emoji' => '🏛️',
            'prompt' => 'This is the oldest building in the town. It . . . . . . . over 200 years ago.',
            'correct' => 'was built',
            'options' => ['was built', 'had been built'],
        ],
        [
            'emoji' => '🏗️',
            'prompt' => 'By the time I moved in, they . . . . . . . the building work.',
            'correct' => 'had finished',
            'options' => ['finished', 'had finished'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])