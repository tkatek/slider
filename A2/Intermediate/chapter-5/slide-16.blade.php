<?php
$content = [
    'page_title'    => 'Sentence Order',
    'title'         => 'Sentence Order',
    'subtitle'      => 'Drag the words to make the correct sentence.',
    'type'          => 'sentence',
    'sentences'     => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
    ],
    'scramble'      => [
        'They were sleeping when the alarm went off.',
        'She was walking her dog when she fell.',
        'What were you doing when the doorbell rang?',
        'While he was talking on the phone, he crashed.',
        'They were watching TV when the blackout happened.',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
