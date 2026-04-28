<?php
$content = [
    'unit'          => "Appearances",
    'lesson'        => "What does she look like?",
    'unit_number'   => '3',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/A2/Beginner/chapter-7/img/slide1/introd.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
