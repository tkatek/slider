<?php
$content = [
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => 'Unscramble the sentences:',
    'type'          => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],

    'scramble' => [
        'Would you mind feeding my cat on Saturday?',
        'Would you be able to help me move into my new house?',
        'could you please water my plants on Saturday?',
        'Would you mind helping me carry this bag?',
        "Would you be able to take care of my house while I'm gone?",
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])