<?php
$content = [
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => 'Unscramble the sentences',
    'type'          => 'sentence',
    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],
    'scramble' => [
        'Have you ever felt homesick?',
        'Have you ever met new people abroad?',
        'What have you done?',
        'How many times have you been to France?',
        'Has she ever tried foreign food?',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])