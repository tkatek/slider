<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'The Art of Entertainment',
    'unit_number'   => '2',
    'lesson'        => "Seaside Entertainment",
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Beginner/chapter-5/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
