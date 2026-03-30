<?php
$content = [
    'image'   => materialAsset('slider/A1/Intermediate/chapter-3/images/thankyou.webp'),
    'text'  => 'What new word or phrase you learnt today❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])