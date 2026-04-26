<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "So, what’s your next step?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-7/img/slide1.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
