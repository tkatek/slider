<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Lend a Hand',
    'unit_number'   => '1',
    'lesson'        => 'Acts of Kindness',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Beginner/chapter-2/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
