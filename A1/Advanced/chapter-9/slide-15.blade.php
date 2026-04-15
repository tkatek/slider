<?php
$content = [
    'page_title' => 'Practice 9',
    'title' => 'Practice 9',
    'subtitle' => 'Put the words in order to make a correct sentence',
    'type' => 'sentence',
    'sentences' => [
        '{{1}}',
        '{{2}}',
        '{{3}}',
        '{{4}}',
        '{{5}}',
    ],
    'scramble' => [
        'A restaurant is a place where we can eat out.',
        'A parking lot is a large area where cars are parked.',
        'A factory is a place where things are made.',
        'A fire station is where firefighters work to keep people safe.',
        'A gym is a place where people work out and exercise.',
    ],
];
?>

@include('slider.game.unscramble', ['content' => $content])