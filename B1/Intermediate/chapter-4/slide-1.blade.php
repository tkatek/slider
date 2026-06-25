<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Brand Awareness',
    'unit_number'   => '2',
    'lesson'        => 'Brands and Their Influence',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-4/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
