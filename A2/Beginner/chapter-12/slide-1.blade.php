<?php
$content = [
    'unit'          => "Healthy Living",
    'lesson'        => "My food pyramid",
    'unit_number'   => '4',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/A2/Beginner/chapter-12/img/slide1/pyramid.webp'),
    'image_size' => 'max-w-[340px] sm:max-w-[440px] lg:max-w-[560px]',
    'button'        => 'Start Session',

];
?>
@include('slider.intro.unit-title-image-2', ['content' => $content])
