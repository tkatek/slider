<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What can you do if you are homesick?",
    'image'    => materialAsset('slider/A2/Advanced/chapter-5/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
