<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'A Planet in Danger',
    'unit_number'   => '2',
    'lesson'        => 'Small Actions, Big Changes',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Advanced/chapter-5/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
