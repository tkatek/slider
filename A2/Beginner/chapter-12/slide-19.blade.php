
<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "Say 2 pieces of advice to stay in shape, using should and shouldn’t ",
    'image'    => materialAsset('slider/A2/Beginner/chapter-12/img/slide19/thanks.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
