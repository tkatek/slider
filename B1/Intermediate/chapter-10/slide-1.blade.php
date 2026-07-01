<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Human Values',
    'unit_number'   => '4',
    'lesson'        => 'Bravery',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-10/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
