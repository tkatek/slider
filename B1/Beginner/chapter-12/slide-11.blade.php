<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 3',
    'subtitle' => 'Choose the correct answer',

    'questions' => [
        [
            'emoji'   => '🙏',
            'prompt'  => 'You . . . . . . . apologized for your mistake.',
            'correct' => 'should have',
            'options' => ['shouldn\'t have', 'should have'],
        ],
        [
            'emoji'   => '😴',
            'prompt'  => 'I feel tired, I . . . . . . . gone to bed so late.',
            'correct' => 'shouldn\'t have',
            'options' => ['should have', 'shouldn\'t have'],
        ],
        [
            'emoji'   => '😟',
            'prompt'  => 'I . . . . . . . said that, I think I might have upset her.',
            'correct' => 'shouldn\'t have',
            'options' => ['shouldn\'t have', 'should have'],
        ],
        [
            'emoji'   => '🎉',
            'prompt'  => 'The party was great! You . . . . . . . come.',
            'correct' => 'should have',
            'options' => ['should have', 'shouldn\'t have'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])