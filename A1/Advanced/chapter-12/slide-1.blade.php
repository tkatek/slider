<?php
$content = [
    'unit'         => 'Out & About',
    'lesson'      => 'Buying a Cell Phone',
    'unit_number'   => '4',
    'lesson_number'  => '3',
    'image'         => materialAsset("slider/A1/Advanced/chapter-12/img/slide-1.webp"),
    'image_alt'     => 'About Me cover image',
    'image_size'    => 'max-w-[340px] sm:max-w-[440px] lg:max-w-[560px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])