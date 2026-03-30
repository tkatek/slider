<?php
    $content = [
        'unit'         => 'Family and Daily Life',
        'lesson'      => 'A day in my life',
        'unit_number'   => '2',
        'lesson_number'  => '3',
        'image'         => materialAsset('slider/A1/Beginner/chapter-6/img/slide1.webp'),
        'image_alt'     => 'Family and Daily Life cover image',
        'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
    ];
?>
@include('slider.intro.unit-title-image', ['content' => $content])