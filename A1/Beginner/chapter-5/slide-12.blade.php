<?php
$content = [
    'image'  => materialAsset('slider/A1/Beginner/chapter-5/img/slide1.webp'),
    'text'  => 'What did you learn today?! 🤔❓✨',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])