<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Making Wishes',
    'unit_number'   => '3',
    'lesson'        => "What If...?",
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Beginner/chapter-8/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
