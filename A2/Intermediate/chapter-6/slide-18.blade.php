<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Were you studying English yesterday evening?! YES or NO?",
    'image'    => materialAsset('slider/A2/Intermediate/chapter-6/img/slide18.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
