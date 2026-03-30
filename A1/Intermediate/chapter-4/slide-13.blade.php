<?php
$content = [
    'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/thankyou.webp'),
    'text'  => 'What one new word or phrase you learnt today?!❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])