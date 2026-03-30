<?php
$content = [
    'page_title'    => 'Quiz Time',
    'title'         => 'Quiz Time',
    'subtitle'      => 'Asking for directions',
    'image'         => materialAsset('slider/A1/Beginner/chapter-7/img/slide8.webp'),
    'type'          => 'image',

    'questions' => [
        [
            'prompt'  => 'Excuse me, where’s the post office?',
            'correct' => 'It’s in New Road',
            'options' => [
                'It’s in New Road',
                'It’s in Queen’s Road',
                'It’s in Bedford Street',
            ],
        ],
        [
            'prompt'  => 'Excuse me, where’s the market?',
            'correct' => 'It’s in Queen’s Road',
            'options' => [
                'It’s in New Road',
                'It’s in Queen’s Road',
                'It’s in Sefton Road',
            ],
        ],
        [
            'prompt'  => 'Excuse me, where’s the bus station?',
            'correct' => 'It’s in London Road',
            'options' => [
                'It’s in London Road',
                'It’s in Sefton Road',
                'It’s in New Road',
            ],
        ],
        [
            'prompt'  => 'Excuse me, where’s the bank?',
            'correct' => 'It’s opposite the supermarket',
            'options' => [
                'It’s opposite the post office',
                'It’s opposite the supermarket',
                'It’s opposite the market',
            ],
        ],
        [
            'prompt'  => 'Excuse me, where’s the sports centre?',
            'correct' => 'It’s next to the garage',
            'options' => [
                'It’s next to the garage',
                'It’s next to the supermarket',
                'It’s next to the car park',
            ],
        ],
    ],
];
?>

@include("slider.game.multi-choice-all-in-one", ['content' => $content])
