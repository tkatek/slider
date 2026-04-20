<?php
$content = [
    'title'    => 'Thank you',
    'subtitle' => "How can you describe your last vacation?",
    'image'    => materialAsset('slider/A2/Beginner/chapter-5/img/slide5.webp'),
    'button'   => 'Start Again',
];
?>

@include('slider.thankYou.thankyou', ['content' => $content])
