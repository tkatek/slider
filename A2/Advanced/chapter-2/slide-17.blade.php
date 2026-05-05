<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Remember the difference between “job” & “work”?!",
    'image'    => materialAsset('slider/A2/Advanced/chapter-2/img/thankyou.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
