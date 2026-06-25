<?php
$content = [
    'page_title' => 'Practice 4',
    'title' => 'Practice 4',
    'subtitle' => 'Unscramble the letters',
    'type' => 'letters',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],

    'scramble' => [
        'Niche',
        'Platform',
        'Expert',
        'Influencer',
        'Audience',
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])