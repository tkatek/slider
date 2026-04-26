<?php
$content = [
    'unit'          => "Things Happen",
    'lesson'        => "When Things Go Wrong",
    'unit_number'   => '2',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-4/img/slide1/introduction.webp'),
    'button'        => 'Start Session',

];
?>
@include('slider.intro.unit-title-image-2', ['content' => $content])
