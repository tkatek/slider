<?php
$content = [
    'image'  => materialAsset('slider/A1/Beginner/chapter-6/img/slide1.webp'),
    'text'  => 'Tell me 3 things you do everyday?! 🤔❓✨',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])