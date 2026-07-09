<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Human Values',
    'unit_number'   => '4',
    'lesson'        => 'Open-mindedness',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-12/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
