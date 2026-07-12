<?php

$content = [

    'title'      => 'Practice 5',
    'subtitle'   => 'Unjumble the words to make correct sentences using to + infinitive.',
    'type'       => 'sentence',

    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],

    'scramble' => [
        'People plant trees to help protect the environment.',
        'We reuse things to reduce waste.',
        'We turn off the lights to save energy.',
        'We use public transportation to help reduce emissions.',
        'We use renewable energy sources to reduce our reliance on fossil fuels.',
    ],
];

?>

@include('slider.game.unscramble', ['content' => $content])