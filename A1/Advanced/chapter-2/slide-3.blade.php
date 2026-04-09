<?php
$content = [
    'title'    => 'Warm-Up: Practice 1',
    'subtitle' => 'Put the words in the correct order',

    'image' => materialAsset('slider/A1/Advanced/chapter-2/img/slide3.webp'),

    'labels' => [
        ['text' => 'reception',        'x' => 30.0, 'y' => 60.0],
        ['text' => 'receptionist',     'x' => 19.5, 'y' => 36.5],
        ['text' => 'registration form','x' => 36.5, 'y' => 50],
        ['text' => 'key',              'x' => 18.0, 'y' => 50],
        ['text' => 'suitcase',         'x' => 21.5, 'y' => 82.5],
        ['text' => 'floor',            'x' => 66.0, 'y' => 84.0],
        ['text' => 'lift/elevator',    'x' => 49.5, 'y' => 35.0],
        ['text' => 'single room',      'x' => 69.0, 'y' => 43.0],
        ['text' => 'double room',      'x' => 86.5, 'y' => 43.5],
        ['text' => 'room number',      'x' => 77.5, 'y' => 12.5],
    ],
];
?>

@include('slider.game.image-drag-drop', ['content' => $content])