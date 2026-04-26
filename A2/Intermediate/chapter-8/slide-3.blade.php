<?php
$content = [
    'page_title'    => 'Practice 1',
    'title'         => 'Practice 1',
    'subtitle'      => 'Warm-up',
    'type'          => 'sentence',
    'sentences'     => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
    ],
    'scramble'      => [
        'What are you going to do after class?',
        'I am not going to watch TV tonight.',
        'He is going to take his driving test this week.',
        'We are travelling to Spain this month.',
        'The plane takes off at 6 am tomorrow.',
        'I will invite her to my wedding.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
