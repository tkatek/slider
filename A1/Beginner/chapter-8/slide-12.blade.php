<?php
$content = [
    'image'  => materialAsset('slider/A1/Beginner/chapter-8/img/c8-slide12.webp'),
    'text'  => 'Now: It’s your turn! 🤔❓✨',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])