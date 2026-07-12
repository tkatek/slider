<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'A Planet in Danger',
    'unit_number'   => '2',
    'lesson'        => 'Be the Change',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Advanced/chapter-6/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
