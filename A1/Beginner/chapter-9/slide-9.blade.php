<?php
$content = [
    'video'     => materialAsset('slider/A1/Beginner/chapter-9/video/measures-encrypted/measures.m3u8'),
    'thumbnail' => materialAsset('slider/A1/Beginner/chapter-9/video/measures.webp'),

    'isQuiz' => 0,
    'questions' => [],

    'subtitles' => [
        ['start' => 0,  'end' => 2,  'text' => 'Measures and quantity.'],
        ['start' => 4,  'end' => 7,  'text' => 'This is a sachet of ketchup.'],
        ['start' => 9.7, 'end' => 11, 'text' => 'A loaf of bread.'],
        ['start' => 13.7, 'end' => 15, 'text' => 'A plate of pasta.'],
        ['start' => 18.5, 'end' => 20, 'text' => 'A jug of lemonade.'],
        ['start' => 24, 'end' => 25.5, 'text' => 'A cup of tea.'],
        ['start' => 28.5, 'end' => 30, 'text' => 'A piece of cake.'],
        ['start' => 33.5, 'end' => 35, 'text' => 'A sack of wheat.'],
        ['start' => 38.5, 'end' => 41, 'text' => 'A tablespoon of sugar.'],
        ['start' => 44, 'end' => 46, 'text' => 'A glass of water.'],
        ['start' => 48.7, 'end' => 51, 'text' => 'A stick of butter.'],
        ['start' => 53.5, 'end' => 55, 'text' => 'A carton of milk.'],
        ['start' => 58.7, 'end' => 60, 'text' => 'A jar of jam.'],
        ['start' => 63.5, 'end' => 65, 'text' => 'A drop of water.'],
        ['start' => 68.5, 'end' => 70.5,'text' => 'A roll of tissue.'],
        ['start' => 73.5, 'end' => 75.5,'text' => 'A clove of garlic.'],
    ],
];

?>
@include("slider.video.interactive", ['content' => $content])