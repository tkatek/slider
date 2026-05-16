<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Everyday Communication Skills',
    'lesson'        => 'Handling Awkward Moments',
    'unit_number'   => '3',
    'lesson_number' => '2',

    'image'     => materialAsset('slider/C2/Beginner/chapter-7/img/slide1.webp'),


    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])