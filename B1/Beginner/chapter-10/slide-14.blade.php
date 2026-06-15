<?php
$content = [
    'page_title' => 'Practice 7',
    'title'      => 'Practice 7',
    'subtitle'   => 'Unscramble the words to make correct sentences:',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],

    'scramble' => [
        'She had cooked dinner before we arrived.',
        'The sun had set when we reached home.',
        'The train had left before 10AM.',
        'It had rained in the morning.',
        'I left after you had come.',
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])