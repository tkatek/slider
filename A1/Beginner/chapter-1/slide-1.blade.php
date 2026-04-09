<?php
$content = [
    'unit'         => 'About Me',
    'lesson'      => 'Meet and Greet',
    'unit_number'   => '1',
    'lesson_number'  => '1',
    'image'         => materialAsset("slider/A1/Beginner/chapter-1/img/slide1.webp"),
    'image_alt'     => '',
    'image_size'    => 'max-w-[340px] sm:max-w-[440px] lg:max-w-[460px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
