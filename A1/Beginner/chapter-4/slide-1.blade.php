<?php
$content = [
    'unit'          => 'Family & Daily Life',
    'lesson'        => 'My Family',
    'unit_number'   => '2',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/A1/Beginner/chapter-4/img/slide1.webp'),
    'image_alt'     => 'Family and Daily Life cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
    'button'        => 'Start Session',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
