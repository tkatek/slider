<?php
$content = [
    'unit'          => "Looking Ahead",
    'lesson'        => "How do you keep in touch?",
    'unit_number'   => '4',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/A2/Intermediate/chapter-10/img/slide1.webp'),
    'button'        => 'Start Session',
    'lesson_class'  => 'text-3xl sm:text-4xl lg:text-5xl xl:text-6xl',

];
?>

@include('slider.intro.unit-title-image-2', ['content' => $content])
