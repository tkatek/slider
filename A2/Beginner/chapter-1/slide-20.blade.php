<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Record an audio of 1 minute saying what season is it? Describe the weather today in your town. What is your favourite  weather?",
    'image'    => materialAsset('slider/A2/Beginner/chapter-1/cover.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
