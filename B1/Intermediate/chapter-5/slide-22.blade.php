<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank you',
    'subtitle'  => "3 things I learned about influencers?<br>2 new words I learned?",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Intermediate/chapter-5/img/slide4.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])