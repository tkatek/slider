<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Advanced Opinion Skills',
    'lesson'        => 'Advanced Debate Skills',
    'unit_number'   => '1',
    'lesson_number' => '3',

    'image'     => materialAsset('slider/C2/Beginner/chapter-3/img/slide1.webp'),
    'image_alt' => 'Notebook and writing',

    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])