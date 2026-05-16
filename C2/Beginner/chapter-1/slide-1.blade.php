<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Advanced Opinion Skills',
    'lesson'        => 'Expressing Complex Opinions',
    'unit_number'   => '1',
    'lesson_number' => '1',

    'image'     => materialAsset('slider/C2/chapter-1/img/slide1.webp'),
    'image_alt' => 'Notebook and writing',

    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])