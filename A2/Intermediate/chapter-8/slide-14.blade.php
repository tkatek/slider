<?php
$content = [
    'page_title'    => 'Practice 6',
    'title'         => 'Practice 6',
    'subtitle'      => 'Put the words in order to make correct sentences',
    'type'          => 'sentence',
    'sentences'     => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],
    'scramble'      => [
        'She will be famous in the future.',
        'They won’t go to the park tomorrow.',
        'It will rain next week.',
        'Will you play computer games tonight?',
        'I will buy a new phone this month.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
