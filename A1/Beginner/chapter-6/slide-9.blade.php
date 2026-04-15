<?php
$content = [
    'page_title'    => 'Unscramble Practice',
    'title'         => 'Unscramble the highlighted words',
    'subtitle'      => 'Drag the letters to put them in the correct order.',
    'type'          => 'letters',
    'sentences' => [
        "How often do you {{1}} TV?",
        "Do you usually {{2}} {{3}} in the morning?",
        "What time do you usually {{4}} {{5}}?",
        "Do you {{6}} your teeth?",
    ],

    'scramble' => [
        'Watch',
        'Eat',
        'Breakfast',
        'Wake',
        'up',
        'Brush',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
