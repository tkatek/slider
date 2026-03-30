<?php
$content = [
    'unit'         => 'Health Issues & Emergencies',
    'lesson'      => 'Emergency Calls',
    'unit_number'   => '2',
    'lesson_number'  => '3',
    'image'         => materialAsset('slider/A1/Intermediate/chapter-6/img/slide1.webp'),
    'image_alt'     => 'cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])