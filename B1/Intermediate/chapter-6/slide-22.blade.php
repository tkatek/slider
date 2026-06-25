<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank you',
    'subtitle'  => "What about you?<br> Are you a shopaholic?",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Intermediate/chapter-6/img/thankyou.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])