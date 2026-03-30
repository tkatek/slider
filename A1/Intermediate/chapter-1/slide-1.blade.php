<?php
$content = [
    'unit' => 'Social Occasions & Community Life',
    'lesson' => 'Sports Events',
    'unit_number' => '1',
    'lesson_number' => '1',
    'image' => materialAsset('slider/A1/Intermediate/chapter-1/img/slide1.webp'),
    'image_alt' => 'Sports Events',
    'button' => 'Start Session',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?> 
@include('slider.intro.unit-title-image', ['content' => $content])
