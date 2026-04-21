<?php
$content = [
    'unit'          => "Past Experiences",
    'lesson'        => "A Memorable Day",
    'unit_number'   => '2',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/A2/Beginner/chapter-6/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
