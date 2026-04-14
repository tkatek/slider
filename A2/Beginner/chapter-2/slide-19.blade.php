<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Can you tell which is the hottest season in the year?",
    'image'    => materialAsset('slider/A2/Beginner/chapter-2/img/slide9.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
