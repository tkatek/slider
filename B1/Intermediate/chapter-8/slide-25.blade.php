<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => "What is one phrasal verb that means “spend time together”?",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Intermediate/chapter-8/img/slide5.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])