<?php
$content = [
    'unit'         => 'Health Issues & Emergencies',
    'lesson'      => 'At the Doctor’s',
    'unit_number'   => '2',
    'lesson_number'  => '1',
    'image'         => materialAsset('slider/A1/Intermediate/chapter-4/img/slide1.webp'),
    'image_alt'     => 'cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])