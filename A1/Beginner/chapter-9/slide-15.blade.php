<?php
$content = [
    'image'  => materialAsset('slider/A1/Beginner/chapter-9/img/thankyou.webp'),
    'text'   => 'Great job! 🛒✨ Can you name 3 things you buy at the supermarket?',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])