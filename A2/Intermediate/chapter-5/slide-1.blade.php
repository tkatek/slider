<?php
$content = [
    'unit'          => "Things Happen",
    'lesson'        => "What Were You Doing?",
    'unit_number'   => '2',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-5/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
