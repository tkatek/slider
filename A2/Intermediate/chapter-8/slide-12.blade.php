<?php
$content = [
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => 'Put the words in order',
    'type'          => 'sentence',
    'sentences'     => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],
    'scramble'      => [
        'If they work hard, they will pass their exams.',
        'If the sun comes out, we will check out that new cafe.',
        'If it rains, we will stay at home.',
        'If I go to London, I will send you a postcard.',
        'If he calls me, I will tell you.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
