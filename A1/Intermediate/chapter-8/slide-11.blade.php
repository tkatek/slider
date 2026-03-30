<?php
$content = [
    'image'   => materialAsset('slider/A1/Intermediate/chapter-8/img/thankyou.webp'),
    'text'  => 'What is one thing you learnt today?❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])