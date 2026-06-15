<?php

$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => 'What do you wish you could do now?',
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Beginner/chapter-7/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])