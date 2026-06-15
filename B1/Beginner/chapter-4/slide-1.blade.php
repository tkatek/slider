<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'The Art of Entertainment',
    'unit_number'   => '2',
    'lesson'        => "What's On?",
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Beginner/chapter-4/img/slide1.webp'),
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
