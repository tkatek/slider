<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'What might have been?!',
    'unit_number'   => '1',
    'lesson'        => 'Mystery Solved!',
    'lesson_number' => '1',
    'image'         => materialAsset('slider/B1/Advanced/chapter-1/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
