<?php
$content = [
    'unit'          => "Looking Ahead",
    'lesson'        => "What are  you doing this weekend?<br>(Future Arrangements)",
    'unit_number'   => '3',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-9/img/slide1.webp'),
    'button'        => 'Start Session',
    'lesson_class'  => 'text-2xl sm:text-3xl lg:text-4xl xl:text-5xl',
    'lesson_allow_html' => true,

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
