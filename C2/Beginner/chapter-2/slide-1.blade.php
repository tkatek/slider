<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Advanced Opinion Skills',
    'lesson'        => 'Critical Thinking & Justifying Opinions',
    'unit_number'   => '1',
    'lesson_number' => '2',

    'image'     => materialAsset('slider/C2/Beginner/chapter-2/img/slide1.webp'),
    'image_alt' => 'Notebook and writing',

    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])