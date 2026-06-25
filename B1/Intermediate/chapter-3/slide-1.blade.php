<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Predictions',
    'unit_number'   => '1',
    'lesson'        => 'Speculating the future',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-3/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
