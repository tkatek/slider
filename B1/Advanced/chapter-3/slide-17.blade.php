<?php
$content = [
    'type'      => 'outro',
    'title'     => 'Thank You!',
    'subtitle'  => "What is “a footprint”?",
    'badge'     => 'Lesson Complete',
    'image'     => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/footprint.webp'),
    'image_alt' => 'Thank you',
    'button'    => 'Start Again',
];

?>

@include('slider.intro.intro-outro-green', ['content' => $content])