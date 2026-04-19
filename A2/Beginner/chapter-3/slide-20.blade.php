<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What new word or phrase did you learn today?",
    'image'    => materialAsset('slider/A2/Beginner/chapter-3/img/slide1.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
