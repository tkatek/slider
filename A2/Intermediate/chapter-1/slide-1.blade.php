<?php
$content = [
    'unit'          => "Around the World",
    'lesson'        => "Exploring Cultures & Traditions",
    'unit_number'   => '1',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-1/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
