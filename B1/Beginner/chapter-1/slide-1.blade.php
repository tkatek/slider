<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'Lend a Hand',
    'unit_number'   => '1',
    'lesson'        => 'Do Me a Favour ',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Beginner/chapter-1/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
