<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Relationships',
    'unit_number'   => '3',
    'lesson'        => 'People Who Inspire Me',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-9/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
