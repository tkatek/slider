<?php

$content = [
    'type'       => 'audio',
    'title'      => 'Practice 8',
    'subtitle'   => 'Listen & then choose the right answer',


    'questions' => [
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/1.mp3'),
            'prompt'  => '',
            'correct' => 'must',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/2.mp3'),
            'prompt'  => '',
            'correct' => 'might',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/3.mp3'),
            'prompt'  => '',
            'correct' => 'must',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/4.mp3'),
            'prompt'  => '',
            'correct' => 'might',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/5.mp3'),
            'prompt'  => '',
            'correct' => "can’t",
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/6.mp3'),
            'prompt'  => '',
            'correct' => 'could',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/7.mp3'),
            'prompt'  => '',
            'correct' => 'must',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/8.mp3'),
            'prompt'  => '',
            'correct' => 'might',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/9.mp3'),
            'prompt'  => '',
            'correct' => 'must',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/10.mp3'),
            'prompt'  => '',
            'correct' => "can’t",
            'options' => ['might', 'must', "can’t", 'could'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])