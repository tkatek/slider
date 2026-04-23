<?php
$content = [
    'unit'          => "Around the World",
    'lesson'        => "It’s just a superstition!",
    'unit_number'   => '1',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-3/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
