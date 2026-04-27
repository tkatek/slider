<?php
$content = [
    'unit'          => "Looking Ahead",
    'lesson'        => "What are  you doing this weekend? (Future Arrangements)",
    'unit_number'   => '3',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-9/img/slide1.webp'),
    'button'        => 'Start Session',
    'lesson_class'  => 'text-3xl sm:text-4xl lg:text-5xl xl:text-6xl',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
