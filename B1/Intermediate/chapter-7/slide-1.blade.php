<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Relationships',
    'unit_number'   => '3',
    'lesson'        => 'Siblings Personalities',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-7/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
