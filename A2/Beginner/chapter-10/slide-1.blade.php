<?php
$content = [
    'unit'          => "Healthy Living",
    'lesson'        => "Healthy Habits",
    'unit_number'   => '4',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/A2/Beginner/chapter-10/img/slide1/Healthy-Habits.webp'),
    'button'        => 'Start Session',

];
?>
@include('slider.intro.unit-title-image-2', ['content' => $content])
