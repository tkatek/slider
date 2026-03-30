<?php
$content = [
    'page_title' => 'Can you do this?!',
    'title' => 'Can you do this?!',
    'subtitle' => 'Drag the words to make the correct sentence.',
    'sentences' => [
        '{{1}}',
        '{{2}}',
        '{{3}}',
        '{{4}}',
        '{{5}}',
    ],
    'scramble' => [
        'I like to sleep in my bedroom',
        'I cook in the kitchen',
        'I watch TV in the living room',
        'I eat in the dining room',
        'I brush my teeth in the bathroom',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
