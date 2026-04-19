<?php
$content = [
    'unit'          => "Past Experiences",
    'lesson'        => "What did you do last weekend?",
    'unit_number'   => '2',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/A2/Beginner/chapter-4/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
