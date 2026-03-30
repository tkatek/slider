<?php
$content = [
    'unit'         => 'Around Town',
    'lesson'      => 'Where’s the bank?',
    'unit_number'   => '3',
    'lesson_number'  => '1',
    'image'         => materialAsset('slider/A1/Beginner/chapter-7/img/slide1.webp'),
    'image_alt'     => 'Around Town cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])