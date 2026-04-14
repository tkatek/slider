<?php
$content = [
    'unit'          => "How's the Weather?",
    'lesson'        => "What’s the weather like?",
    'unit_number'   => '1',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/A2/Beginner/chapter-1/cover.webp'),
    'button'        => 'Start Session',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
