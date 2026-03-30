<?php
$content = [
    'image'  => materialAsset('slider/A1/Beginner/chapter-12/img/thankyou.webp'),
    'text'  => 'What new idiom you learnt today❓🤔✨',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])