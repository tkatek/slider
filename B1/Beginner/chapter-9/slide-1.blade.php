<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Making Wishes',
    'unit_number'   => '3',
    'lesson'        => "Giving Advice: If I Were You...",
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Beginner/chapter-9/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
