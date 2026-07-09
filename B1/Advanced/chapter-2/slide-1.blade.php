<?php

$content = [
    'type'          => 'intro',
    'unit'          => 'What might have been?!',
    'unit_number'   => '1',
    'lesson'        => 'How certain are you?!',
    'lesson_number' => '2',
    'image'         => materialAsset('slider/B1/Advanced/chapter-2/img/slide1.webp'),
    'image_alt'     => 'Lesson image',
    'button'        => 'Start Session',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])
