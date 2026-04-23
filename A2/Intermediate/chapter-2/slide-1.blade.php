<?php
$content = [
    'unit'          => "Around the World",
    'lesson'        => "The world cuisine",
    'unit_number'   => '1',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-2/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
