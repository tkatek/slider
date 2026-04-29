<?php
$content = [
    'unit'          => "Healthy Living",
    'lesson'        => "A Healthy Diet",
    'unit_number'   => '4',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/A2/Beginner/chapter11/img/slide1/introduction.webp'),
    'image_size' => 'max-w-[340px] sm:max-w-[440px] lg:max-w-[560px]',
    'button'        => 'Start Session',

];
?>
@include('slider.intro.unit-title-image-2', ['content' => $content])
