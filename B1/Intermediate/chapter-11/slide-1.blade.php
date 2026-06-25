<?php

$content = [
    'type'          => 'intro',
    'unit'          => '',
    'unit_number'   => '4',
    'lesson'        => '',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-11/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
