<?php
$content = [
    'image'   => materialAsset('slider/A1/Advanced/chapter-2/img/cover.webp'),
    'text'  => 'How can you report a complaint to the hotel manager❓🤔',
];
?>
@include('slider.thankYou.text-image', ['content' => $content])