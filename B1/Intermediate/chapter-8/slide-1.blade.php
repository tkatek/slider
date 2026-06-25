<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Relationships',
    'unit_number'   => '3',
    'lesson'        => 'Special Friendships',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-8/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
