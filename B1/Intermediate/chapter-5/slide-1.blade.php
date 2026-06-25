<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Brand Awareness',
    'unit_number'   => '2',
    'lesson'        => 'Influencers and Their Effect',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-5/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
