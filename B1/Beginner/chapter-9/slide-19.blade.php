<?php

$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => 'What advice can you give your best friend to be good at English?',
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Beginner/chapter-9/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])