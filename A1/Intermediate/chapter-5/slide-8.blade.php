<?php
$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Drag & Drop words to rearrange sentences.',
    'sentences'  => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
    ],
    'scramble'   => [
        'Do I take this with water?',
        'Do I take this with food?',
        'How many do I need to take?',
        'I need something for a sore throat.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])