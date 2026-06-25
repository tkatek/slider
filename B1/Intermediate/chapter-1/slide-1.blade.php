<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Predictions',
    'unit_number'   => '1',
    'lesson'        => 'Making present speculations',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-1/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
