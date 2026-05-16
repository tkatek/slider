<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Everyday Communication Skills',
    'lesson'        => 'Projecting Confidence in Everyday Conversations',
    'unit_number'   => '3',
    'lesson_number' => '1',

    'image'     => materialAsset('slider/C2/Beginner/chapter-4/img/slide1.webp'),
    'image_alt' => 'Notebook and writing',

    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])