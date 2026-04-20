<?php
$content = [
    'image' => materialAsset("slider/A1/Advanced/chapter-11/img/slide15/thanks-you.webp"),
    'text' => 'Which is more expensive, premium or regular fuel❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])