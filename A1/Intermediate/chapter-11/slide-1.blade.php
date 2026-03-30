<?php
$content = [
    'unit'         => 'At the Airport ',
    'lesson'      => 'At the Security control',
    'unit_number'   => '4',
    'lesson_number'  => '2',
    'image'         => materialAsset('slider/A1/Intermediate/chapter-11/img/slide1.webp'),
    'image_alt'     => 'cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])