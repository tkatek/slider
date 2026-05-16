<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "How can you make a complaint of a noisy neighbour?",
    'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
