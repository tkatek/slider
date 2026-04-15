<?php
$content = [
    'page_title'    => 'Daily Routine — Sentence Order',
    'title'         => 'Sentence Order',
    'subtitle'      => 'Drag the words to make the correct sentence.',
    'type'          => 'sentence',
    'sentences'=>[
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",

    ],
    'scramble' =>
        [
            'I get up at 6:30 a.m.',
            'I have breakfast at 6:45 a.m.',
            'I have a shower at 7:00 a.m.',
            'I get dressed at 7:15 a.m.',
            'I take the bus at 7:30 a.m.'
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
