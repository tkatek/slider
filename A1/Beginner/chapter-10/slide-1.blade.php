<?php
$content = [
    'unit'         => 'Home and Daily Needs',
    'lesson'      => 'Shopping at the Mall',
    'unit_number'   => '4',
    'lesson_number'  => '1',
    'image'         => materialAsset('slider/A1/Beginner/chapter-10/img/slide1.webp'),
    'image_alt'     => 'cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])