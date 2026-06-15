<?php

$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => 'What if you were the boss at work? What would you do?',
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Beginner/chapter-8/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])