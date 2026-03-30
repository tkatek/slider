<?php
$content = [
    'unit'         => 'Around Town',
    'lesson'      => 'At the Supermarket',
    'unit_number'   => '3',
    'lesson_number'  => '3',
    'image'         => materialAsset('slider/A1/Beginner/chapter-9/img/slide1.webp'),
    'image_alt'     => 'cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])