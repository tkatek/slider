{{-- resources/views/slider/slide-empty.blade.php --}}
<?php
$content = [
    'page_title' => 'Let’s watch this video',
    'title'      => 'Let’s watch this video',
    'subtitle'   => 'Which country do you prefer to go to on holiday?',

    // ✅ Add a thumbnail per short (9:16 like YouTube Shorts, e.g. 1080x1920)
    'shorts'     => [
        [
            'src'       => materialAsset(''),
            'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-7/img/short.webp'),
        ],
    ],
];
?>

@include("slider.video.short-video",['content'=>$content])