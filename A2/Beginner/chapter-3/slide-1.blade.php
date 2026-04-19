<?php
$content = [
    'unit'          => "How's the Weather?",
    'lesson'        => "The Weather Forecast",
    'unit_number'   => '1',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/A2/Beginner/chapter-3/img/slide1.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
