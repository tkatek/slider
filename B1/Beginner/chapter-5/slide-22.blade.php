<?php

$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => 'What is your favorite seaside activity and why?<br>What new expression you learnt today?',
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Beginner/chapter-5/img/slide1.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])