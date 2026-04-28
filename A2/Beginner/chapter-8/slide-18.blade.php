
<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Say one new adjective to describe yourself!",
    'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide18/thank-you.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
