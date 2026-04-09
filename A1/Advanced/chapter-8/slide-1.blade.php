<?php
$content = [
    'unit' => 'My Community',
    'lesson' => 'Describing my Neighbourhood',
    'unit_number' => '3',
    'lesson_number' => '2',
    'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide1.webp'),

    'button' => 'Start Session',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
