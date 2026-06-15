<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Looking Back',
    'unit_number'   => '4',
    'lesson'        => "Past Experiences",
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Beginner/chapter-10/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
