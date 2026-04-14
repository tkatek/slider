<?php
$content = [
    'unit' => 'My Community',
    'lesson' => 'Places in My Community',
    'unit_number' => '3',
    'lesson_number' => '3',
    'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide1.webp'),

    'button' => 'Start Session',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
