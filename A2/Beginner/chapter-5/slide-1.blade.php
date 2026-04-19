<?php
$content = [
    'unit'          => "Past Experiences",
    'lesson'        => "My Last Holiday",
    'unit_number'   => '2',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/A2/Beginner/chapter-5/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
