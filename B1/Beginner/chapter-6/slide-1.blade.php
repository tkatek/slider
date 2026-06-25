<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'The Art of Entertainment',
    'unit_number'   => '2',
    'lesson' => "Indoor  vs. Outdoor Entertainment",
    'lesson_class' => 'text-3xl sm:text-4xl lg:text-4xl tracking-normal',
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Beginner/chapter-6/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
