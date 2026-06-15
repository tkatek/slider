<?php
$content = [
    'page_title'    => '',
    'title'         => 'Practice 4',
    'subtitle'      => 'Re-arrange the words to make sentences:',
    'type'          => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],

    'scramble' => [
        'If I were you, I would say sorry.',
        'If I were you, I wouldn’t do that.',
        'If I were you, I would go to the dentist.',
        'If I were you, I would take up jogging.',
        'If I were you, I would speak English more.',
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])