<?php
$content = [
    'page_title'    => 'Practice 1: Warm-up',
    'title'         => 'Practice 1: Warm-up',
    'subtitle'      => 'Do you remember some of the phone calls problems?',
    'type'          => 'sentence',
    'sentences'=>[
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
        "{{7}}",
        "{{8}}",
        "{{9}}",
        "{{10}}",

    ],
    'scramble' =>
        [
            'Can you speak up, please?',
            'Can you hear me?',
            'Can you repeat that, please?',
            'What’s your name, please?',
            'Hello, this is Sadia speaking.',
            'Sorry, can you slow down, please?',
            'I’m sorry I don’t understand.',
            'Can you say that again?',
            'Why are you ringing me?',
            'I can’t help you. Bye.',
        ],
];
?>
@include('slider.game.unscramble', ['content' => $content])