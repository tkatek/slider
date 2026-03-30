<?php

$content = [
    'unit' => 'Social Occasions & Community Life',
    'lesson' => 'A School Visit',
    'unit_number' => '1',
    'lesson_number' => '3',
    'image' => materialAsset('slider/A1/Intermediate/chapter-3/images/slide1.webp'),
    'image_alt' => 'A School Visit',
    'button' => 'Start Session',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
