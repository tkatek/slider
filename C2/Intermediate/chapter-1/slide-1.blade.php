<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Banking & Postal Services',
    'lesson'        => 'Sending Packages & Asking Questions',
    'unit_number'   => '1',
    'lesson_number' => '1',

    'image'     => materialAsset('slider/C2/Intermediate/chapter-1/img/slide1.webp'),


    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])