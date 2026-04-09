<?php
$content = [
    'title'         => 'Practice 3',
    'subtitle'      => 'Drag each label to the correct place',

    'image' => materialAsset('slider/A1/Intermediate/chapter-12/img/plane.webp'),

    'labels' => [
        ['text' => 'pilot',            'x' => 20.5, 'y' => 67.6],
        ['text' => 'door',             'x' => 43.0, 'y' => 70.3],
        ['text' => 'flight attendant', 'x' => 55.0, 'y' => 46.3],
        ['text' => 'window',            'x' => 62.1, 'y' => 35.1],
        ['text' => 'aisle',             'x' => 74.4, 'y' => 48.8],
        ['text' => 'seat',           'x' => 84.3, 'y' => 54.4],
        ['text' => 'overhead bin',     'x' => 77.0, 'y' => 22.1],
    ],
];
?>

@include('slider.game.image-drag-drop', ['content' => $content])