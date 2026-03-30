{{-- resources/views/slider/slide-empty.blade.php --}}
<?php
$content = [
    'page_title' => 'Formal vs. Informal Interactions',
    'title'      => 'Formal vs. Informal Interactions',
    'subtitle'   => 'Notice the difference?',

    // ✅ Add a thumbnail per short (9:16 like YouTube Shorts, e.g. 1080x1920)
    'shorts'     => [
        [
            'src'       => materialAsset(''),
            'thumbnail' => materialAsset('slider/A1/Intermediate/chapter-3/images/short.webp'),
        ],
    ],
];
?>

@include("slider.video.short-video",['content'=>$content])