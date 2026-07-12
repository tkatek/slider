<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => "One new word I will remember is...<br>One thing I will do this week to help the environment is...",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Advanced/chapter-6/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])