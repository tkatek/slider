
<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "How long is your hair?",
    'image'    => materialAsset('slider/A2/Beginner/chapter-7/img/slide20/ending.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
