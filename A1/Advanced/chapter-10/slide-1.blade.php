<?php
$content = [
    'unit'         => 'Out & About',
    'lesson'      => 'In Action!',
    'unit_number'   => '4',
    'lesson_number'  => '1',
    'image'         => materialAsset("slider/A1/Advanced/chapter-10/img/slide1/in-actions.webp"),
    'image_alt'     => 'About Me cover image',
    'image_size'    => 'max-w-[340px] sm:max-w-[440px] lg:max-w-[560px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])