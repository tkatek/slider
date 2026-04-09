<?php
$content = [
    'page_title' => 'Practice 6',
    'title' => 'Practice 6',
    'subtitle' => 'Put the words in order to make a correct sentence',
    'sentences' => [
        '{{1}}',
        '{{2}}',
        '{{3}}',
        '{{4}}',
        '{{5}}',
        '{{6}}',
        '{{7}}',
        '{{8}}',
    ],
    'scramble' => [
        "I'd like to book a room, please.",
        'Do you have a reservation?',
        'Can I check in please?',
        'Here is your key card',
        'Could you sign here please?',
        'How much is the bill?',
        'Is there a gym at the hotel?',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])

