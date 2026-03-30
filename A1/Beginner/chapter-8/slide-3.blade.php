<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, you will be able to:',

    'outcomes' => [
        [
            'label' => 'Transportation 🚍🚆🚕',
            'text'  => 'Name transportation (bus, train, taxi).',
        ],
        [
            'label' => 'Schedules 🗓️⏰',
            'text'  => 'Read a simple schedule.',
        ],
        [
            'label' => 'Travel 🧭🚶‍♂️',
            'text'  => 'Say how you travel.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])
