<?php
$content = [
    'page_title' => 'Practice 1: Warm-Up',
    'title' => 'Practice 1: Warm-Up',
    'subtitle' => 'Let’s do a quick Revision!',
    'sentences' => [
        '{{1}}',
        '{{2}}',
        '{{3}}',
        '{{4}}',
        '{{5}}',
        '{{6}}',
        '{{7}}',
        '{{8}}',
    ],
    'scramble' => [
        'I would like to check in.',
        'May I see your ticket and passport?',
        'Here you are.',
        'How many bags do you have for check in?',
        'I just have one bag for check in.',
        'Would you like a window seat or an aisle seat?',
        'I would like a window seat.',
        'Here’s your boarding pass.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])