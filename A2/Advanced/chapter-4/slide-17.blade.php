<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Have you ever climbed a mountain?",
    'image'    => materialAsset('slider/A2/Advanced/chapter-4/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
