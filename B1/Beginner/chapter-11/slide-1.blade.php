<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Looking Back',
    'unit_number'   => '4',
    'lesson'        => "Regrets & Missed Opportunities",
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Beginner/chapter-11/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
