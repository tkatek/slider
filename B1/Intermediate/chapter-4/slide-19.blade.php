<?php

$content = [
    'type'       => 'audio',
    'title'      => 'Listen again',
    'subtitle'   => 'Listen again & choose the correct answer.',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide18.mp3'),

    'questions' => [
        [
            'prompt'  => 'Why did the company change its name to VISA?',
            'correct' => 'To sound more international',
            'options' => [
                'To sell food products',
                'To sound more international',
                'To become a bank',
            ],
        ],
        [
            'prompt'  => 'What idea does the word “VISA” suggest?',
            'correct' => 'Travel and international movement',
            'options' => [
                'Shopping locally',
                'Travel and international movement',
                'Banking only in America',
            ],
        ],
        [
            'prompt'  => 'What type of products does Sara Lee sell?',
            'correct' => 'Cakes, pies, and cookies',
            'options' => [
                'Electronics',
                'Cars',
                'Cakes, pies, and cookies',
            ],
        ],
        [
            'prompt'  => 'Why did the company create the name “Exxon”?',
            'correct' => 'It was a unique international name',
            'options' => [
                'It was a family name',
                'It was a traditional word',
                'It was a unique international name',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])