<?php
$content = [
    'unit'          => "Things Happen",
    'lesson'        => "What Happened While you were.....?",
    'unit_number'   => '2',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-6/img/slide1.webp'),
    'button'        => 'Start Session',
    'lesson_class'  => 'text-3xl sm:text-4xl lg:text-5xl xl:text-6xl',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
