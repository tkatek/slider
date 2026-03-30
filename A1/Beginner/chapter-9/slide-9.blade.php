<?php
$content = [
    'video'     => materialAsset('slider/A1/Beginner/chapter-9/video/measures-encrypted/measures.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-9/video/measures.webp'),

    'isQuiz' => 0,
    'questions' => [],

    'subtitles' => [
        ['start' => 0,  'end' => 2,  'text' => 'Measures and quantity.'],
        ['start' => 4,  'end' => 7,  'text' => 'This is a sachet of ketchup.'],
        ['start' => 9, 'end' => 11, 'text' => 'A loaf of bread.'],
        ['start' => 12, 'end' => 15, 'text' => 'A plate of pasta.'],
        ['start' => 16, 'end' => 20, 'text' => 'A jug of lemonade.'],
        ['start' => 22, 'end' => 25, 'text' => 'A cup of tea.'],
        ['start' => 27, 'end' => 30, 'text' => 'A piece of cake.'],
        ['start' => 32, 'end' => 36, 'text' => 'A sack of wheat.'],
        ['start' => 37, 'end' => 41, 'text' => 'A tablespoon of sugar.'],
        ['start' => 42, 'end' => 46, 'text' => 'A glass of water.'],
        ['start' => 47, 'end' => 51, 'text' => 'A stick of butter.'],
        ['start' => 52, 'end' => 55, 'text' => 'A carton of milk.'],
        ['start' => 57, 'end' => 60, 'text' => 'A jar of jam.'],
        ['start' => 61, 'end' => 65, 'text' => 'A drop of water.'],
        ['start' => 67, 'end' => 71,'text' => 'A roll of tissue.'],
        ['start' => 72, 'end' => 76,'text' => 'A clove of garlic.'],
    ],
];

?>
@include("slider.video.interactive", ['content' => $content])