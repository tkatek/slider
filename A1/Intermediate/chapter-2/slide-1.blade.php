<?php
$content = [
    'unit'         => 'Social Occasions & Community Life',
    'lesson'      => 'Festivals & Celebrations',
    'unit_number'   => '1',
    'lesson_number'  => '2',
    'image'         => materialAsset('slider/A1/Intermediate/chapter-2/img/slide1.webp'),
    'image_alt'     => 'cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])