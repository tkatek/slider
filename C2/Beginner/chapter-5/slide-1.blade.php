<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Professional Relationships',
    'lesson'        => 'Maintaining Professional Connections',
    'unit_number'   => '2',
    'lesson_number' => '2',

    'image'     => materialAsset('slider/C2/Beginner/chapter-5/img/slide1.webp'),
    'image_alt' => 'Notebook and writing',

    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])