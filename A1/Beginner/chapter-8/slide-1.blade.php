<?php
$content = [
    'unit'         => 'Around Town',
    'lesson'      => 'How do you go to work',
    'unit_number'   => '3',
    'lesson_number'  => '2',
    'image'         => materialAsset('slider/A1/Beginner/chapter-8/img/c8-slide1.webp'),
    'image_alt'     => 'Around Town cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])