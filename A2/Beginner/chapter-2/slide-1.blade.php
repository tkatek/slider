<?php
$content = [
    'unit'          => "How's the Weather?",
    'lesson'        => "What is the coldest season in the year?",
    'unit_number'   => '1',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/A2/Beginner/chapter-1/slide16.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
