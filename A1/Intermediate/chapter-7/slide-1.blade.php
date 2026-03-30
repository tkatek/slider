<?php
$content = [
    'unit'         => 'Travel Plans',
    'lesson'      => 'Going Away',
    'unit_number'   => '3',
    'lesson_number'  => '1',
    'image'         => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-1.webp'),
    'image_alt'     => 'Around Town cover image',
    'image_size'    => 'max-w-[340px] sm:max-w-[430px] lg:max-w-[510px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])