<?php
$content = [
    'unit'         => 'Health Issues & Emergencies',
    'lesson'      => 'At the Pharmacy',
    'unit_number'   => '2',
    'lesson_number'  => '2',
    'image'         => materialAsset('slider/A1/Intermediate/chapter-5/slide1.webp'),
    'image_alt'     => 'cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])