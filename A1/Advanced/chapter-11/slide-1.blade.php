<?php
$content = [
    'unit'          => 'Out & About',
    'lesson'        => 'At the Gas Station',
    'unit_number'   => '4',
    'lesson_number' => '2',
    'image'         => materialAsset("slider/A1/Advanced/chapter-11/img/introduction.webp"),
    'image_alt'     => 'Gas station cover image',
    'image_size'    => 'max-w-[340px] sm:max-w-[440px] lg:max-w-[560px]',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])