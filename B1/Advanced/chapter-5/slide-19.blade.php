<?php
$content = [
    'title'    => 'Task 2',
    'subtitle' => 'Decide if the statements are true or false.',
    'type'     => 'text',

    'questions' => [
        [
            'prompt'  => 'Factories and industries have no role in protecting the environment.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'Students can help spread awareness by participating in environmental campaigns.',
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'If we do not protect the environment, there will be no serious consequences.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'Protecting the environment is necessary for a sustainable future.',
            'correct' => '🟢 True',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
        [
            'prompt'  => 'The main idea of the passage is that only governments are responsible for protecting the environment.',
            'correct' => '🔴 False',
            'options' => [
                '🟢 True',
                '🔴 False',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])