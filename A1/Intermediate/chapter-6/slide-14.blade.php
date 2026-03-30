<?php
$content = [
    'page_title' => 'Practice 3',
    'title' => 'Practice 3',
    'subtitle' => 'ESOL Emergency Services',
    'sentences' => [
        '{{1}}',
        '{{2}}',
        '{{3}}',
        '{{4}}',
        '{{5}}',
        '{{6}}',
    ],
    'scramble' => [
        'There is a fire.',
        'There is a fight.',
        'He has a heart attack.',
        'The house is on fire.',
        'Someone stole my wallet.',
        'There is a car accident.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
