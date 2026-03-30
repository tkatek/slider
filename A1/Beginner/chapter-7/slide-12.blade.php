<?php
$content = [
    'image'  => materialAsset('slider/A1/Beginner/chapter-7/img/slide11.webp'),
    'text'  => 'What did you learn today?! 🤔❓✨',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])