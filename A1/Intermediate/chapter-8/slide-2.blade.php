<?php
$content = [
    'page_title' => 'Put the words in order',
    'title' => 'Put the words in order',
    'subtitle' => 'Warm-up Activity',
    'type' => 'sentence',
    'sentences' => [
        '{{1}}',
        '{{2}}',
        '{{3}}',
        '{{4}}',
        '{{5}}',
    ],
    'scramble' => [
        'I am going to travel to Italy in the summer.',
        'We are going to play soccer this weekend.',
        'Are you going to travel to Spain?',
        'They are not going to fly to New York.',
        'Is she going to visit her grandparents?',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
