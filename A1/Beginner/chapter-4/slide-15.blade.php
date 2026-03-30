<?php
$content = [
    'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide15.webp'),
    'text' => 'What did you learn today?! 🤔❓✨',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])
