<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "What did you learn today❓🤔",
    'image'    => materialAsset('slider/A2/Advanced/chapter-6/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
