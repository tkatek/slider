<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Now you're ready to talk about your future plans in English!",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-9/img/slide1.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
