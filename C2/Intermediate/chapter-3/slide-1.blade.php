<?php

$content = [
    'type' => 'intro',

    'unit'          => 'Banking & Postal Services',
    'lesson'        => 'Opening an Account & Asking Questions at the Bank',
    'unit_number'   => '1',
    'lesson_number' => '3',

    'image'     => materialAsset('slider/C2/Intermediate/chapter-3/img/slide1.webp'),


    'button'        => 'Start Session',
    'next_fallback' => 'slide-2.blade.php',
];

?>

@include('slider.C2.components.intro-outro', ['content' => $content])