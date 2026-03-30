<?php
    $content = [
        'unit'         => 'About Me',
        'lesson'      => 'My Information &  My Resume',
        'unit_number'   => '1',
        'lesson_number'  => '2',
        'image'         => materialAsset("slider/A1/Beginner/chapter-2/img/slide1.webp"),
        'image_alt'     => 'About Me cover image',
        'image_size'    => 'max-w-[340px] sm:max-w-[440px] lg:max-w-[460px]',
    ];
?>
@include('slider.intro.unit-title-image', ['content' => $content])