<?php
$content = [
    'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide1.webp'),
    'text'  => 'What should passengers do before getting on the train❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])