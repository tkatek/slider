<?php
$content = [
    'page_title' => 'Practice 5',
    'title' => 'Practice 5',
    'subtitle' => 'Drag and drop words to rearrange each sentence into its correct order',
    'type' => 'sentence',
    'sentences' => [
        '{{1}}',
        '{{2}}',
        '{{3}}',
        '{{4}}',
        '{{5}}',
    ],
    'scramble' => [
        'You shouldn’t carry a lot of cash.',
        'You should pack a jacket.',
        'You should bring your laptop with you.',
        'You shouldn’t forget your phone charger.',
        'You shouldn’t forget your passport.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
