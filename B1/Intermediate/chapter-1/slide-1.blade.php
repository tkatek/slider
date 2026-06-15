<?php

$content = [
    'type'          => 'intro',
    'unit'          => '',
    'unit_number'   => '1',
    'lesson'        => '',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-1/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
