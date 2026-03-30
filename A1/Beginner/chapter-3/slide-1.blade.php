<?php
$content = [
    'unit'          => 'About Me',
    'lesson'        => 'Job Interview',
    'unit_number'   => '1',
    'lesson_number' => '3',
    'image'         => materialAsset("slider/A1/Beginner/chapter-2/img/slide13.webp"),
    'image_alt'     => 'Family and Daily Life cover image',
    'image_size'    => 'max-w-[380px] sm:max-w-[460px] lg:max-w-[540px]',
    'button'        => 'Start Session',
];
?>
@include('slider.intro.unit-title-image', ['content' => $content])
