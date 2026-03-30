<?php
$content = [
    'unit' => 'From check-in to check-out',
    'lesson' => 'Check-Out',
    'unit_number' => '1',
    'lesson_number' => '3',
    'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide1.webp'),
    'image_alt' => 'Sports Events',
    'button' => 'Start Session',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
