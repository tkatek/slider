<?php
$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1',
    'subtitle'   => 'Let’s find out about some of your eating habits',
    'instruction' => 'Drag & drop words to rearrange sentences',
    'type'       => 'sentence',
    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
        "{{7}}",
    ],

    'scramble' => [
        'I eat fruit and vegetables every day.',
        'I drink 7 glasses of water a day.',
        'I go for a walk every day.',
        'I don’t eat junk food.',
        'I don’t drink fizzy drinks.',
        'I sleep 7 hours at night.',
        'I don’t eat sweets.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
