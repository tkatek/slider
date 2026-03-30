<?php
$content = [
    'unit'         => 'Home and Daily Needs',
    'lesson'      => 'Paying Bills',
    'unit_number'   => '4',
    'lesson_number'  => '3',
    'image'         => materialAsset('slider/A1/Beginner/chapter-12/img/slide1.webp'),
    'image_alt'     => 'cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])