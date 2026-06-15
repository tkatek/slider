<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Looking Back',
    'unit_number'   => '4',
    'lesson'        => "Past Regrets: What Should I Have Done?",
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Beginner/chapter-12/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
