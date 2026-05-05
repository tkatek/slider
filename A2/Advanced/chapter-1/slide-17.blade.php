<?php
$content = [
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Unscramble the sentences',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
        "{{7}}",
        "{{8}}",
    ],

    'scramble' => [
        'What are you responsible for?',
        "What's your role in the company?",
        'What do you do?',
        'What do you do for a living?',
        'Do you like your co-workers?',
        'I am the head of design',
        'I don’t mind my job',
        'I love my job because it is challenging',
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])