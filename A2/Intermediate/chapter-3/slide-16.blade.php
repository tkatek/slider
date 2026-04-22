<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What superstitions do you know from your own culture?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide4.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
