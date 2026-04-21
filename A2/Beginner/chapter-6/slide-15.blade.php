<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Say one thing you used to do in the past, and another thing you didn’t use to do",
    'image'    => materialAsset('slider/A2/Beginner/chapter-6/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
