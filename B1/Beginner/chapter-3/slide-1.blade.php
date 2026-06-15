<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Lend a Hand',
    'unit_number'   => '1',
    'lesson'        => "Sorry, I Didn't Mean To!",
    'lesson_number' => '3',
    'image'         => materialAsset('slider/B1/Beginner/chapter-3/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
