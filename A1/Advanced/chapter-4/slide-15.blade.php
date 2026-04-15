<?php
$content = [
    'page_title' => 'Practice 5',
    'title'      => 'Practice 5',
    'subtitle'   => 'Put the words in order',
    'type'       => 'sentence',
    'sentences'  => [
        "{{1}}", "{{2}}", "{{3}}", "{{4}}", "{{5}}","{{6}}", "{{7}}", "{{8}}", "{{9}}", "{{10}}",
    ],
    'scramble'   => [
        'I have breakfast at 7:00.',
        'What do you eat for lunch?',
        'They don\'t eat fast food.',
        'I don\'t like fish.',
        'Where do they work?',
        'They don\'t eat cereal for breakfast.',
        'Do you have dinner at home?',
        'We drive to work everyday.',
        'Why do you watch tv?',
        'How do they go to work?',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
