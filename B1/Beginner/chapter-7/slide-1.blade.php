<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Making Wishes',
    'unit_number'   => '3',
    'lesson'        => "I Wish",
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Beginner/chapter-7/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
