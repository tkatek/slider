<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Banking & Postal Services',
    'lesson'        => 'Handling Problems at the Post Office',
    'unit_number'   => '1',
    'lesson_number' => '2',

    'image'     => materialAsset('slider/C2/Intermediate/chapter-2/img/slide1.webp'),


    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])