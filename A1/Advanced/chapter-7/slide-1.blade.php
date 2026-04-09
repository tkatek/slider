<?php
$content = [
    'unit' => 'My Community',
    'lesson' => 'Notices & Signs around Town',
    'unit_number' => '3',
    'lesson_number' => '1',
    'image' => materialAsset('slider/A1/Advanced/chapter-7/img/slide1.webp'),

    'button' => 'Start Session',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
