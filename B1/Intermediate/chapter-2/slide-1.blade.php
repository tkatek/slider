<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Predictions',
    'unit_number'   => '1',
    'lesson'        => 'Making past speculations',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-2/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
