<?php
$content = [
    'page_title' => 'Listening Match',
    'title' => 'Listening Match',
    'subtitle' => 'Listen and match each audio clip with the correct sentence',
    'type' => 'image',
    'items_per_line' => 4,
    'items_per_line_mobile' => 2,

    'categories' => [
        'i-cant-hear-you-very-well' => [
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide12/i-cant-hear-you-very-well.mp3'),
            'items' => ["I can't hear you very well."],
        ],
        'the-signal-is-weak' => [
            'sound' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide12/the-signal-is-weak.mp3'),
            'items' => ['The signal is weak.'],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
