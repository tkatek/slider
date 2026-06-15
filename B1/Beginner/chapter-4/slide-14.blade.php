<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 5',
    'subtitle' => 'Choose the correct adjective',

    'questions' => [
        [
            'emoji'   => '🎬✨',
            'prompt'  => 'The movie was very . . . . . . .',
            'correct' => 'exciting',
            'options' => ['excited', 'exciting']
        ],
        [
            'emoji'   => '🎬🥱',
            'prompt'  => 'I was . . . . . . . during the film.',
            'correct' => 'bored',
            'options' => ['bored', 'boring']
        ],
        [
            'emoji'   => '👻🎬',
            'prompt'  => 'Horror movies are usually . . . . . . .',
            'correct' => 'frightening',
            'options' => ['frightened', 'frightening']
        ],
        [
            'emoji'   => '📖🎬',
            'prompt'  => 'We were really . . . . . . . in the story.',
            'correct' => 'interested',
            'options' => ['interested', 'interesting']
        ],
        [
            'emoji'   => '🎞️😮',
            'prompt'  => 'The ending was . . . . . . .',
            'correct' => 'surprising',
            'options' => ['surprised', 'surprising']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])