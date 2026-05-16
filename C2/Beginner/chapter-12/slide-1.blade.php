<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Thinking and Responding Confidently in English',
    'lesson'        => 'Sounding Confident When You Disagree',
    'unit_number'   => '4',
    'lesson_number' => '3',

    'image'     => materialAsset('slider/C2/Beginner/chapter-12/img/slide1.webp'),


    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])