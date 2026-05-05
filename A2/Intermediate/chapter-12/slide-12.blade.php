<?php
$content = [
    'title'    => 'Practice 3',
    'subtitle' => 'Match the pictures with the gestures',

    'questions' => [
        [
            'id'    => '1',
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide12/that-sounds-crazy.webp'),
            'word'  => 'That sounds crazy!',
        ],
        [
            'id'    => '2',
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide12/i-dont-know.webp'),
            'word'  => "I don't know.",
        ],
        [
            'id'    => '3',
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide12/be-quiet.webp'),
            'word'  => 'Be quiet.',
        ],
        [
            'id'    => '4',
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide12/im-finished.webp'),
            'word'  => "I'm finished.",
        ],
        [
            'id'    => '5',
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide12/i-cant-hear-you.webp'),
            'word'  => "I can't hear you.",
        ],
        [
            'id'    => '6',
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide12/come-here.webp'),
            'word'  => 'Come here.',
        ],
    ],
];
?>

@include('slider.game.match-picture-word', ['content' => $content])