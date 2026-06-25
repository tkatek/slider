<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Brand Awareness',
    'unit_number'   => '2',
    'lesson'        => 'Advertising and Consumer Choices',
    'lesson_class' => 'text-3xl sm:text-4xl lg:text-5xl',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Intermediate/chapter-6/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
