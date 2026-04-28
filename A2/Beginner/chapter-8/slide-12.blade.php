<?php
$content = [
    'page_title' => 'New vocabulary 2',
    'title'      => 'New vocabulary 2',
    'subtitle'   => 'Learn these new personality words.',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [

        [
            'text' => 'busy',
            'emoji' => '📅',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide12/busy.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/busy.webp')
        ],

        [
            'text' => 'hardworking',
            'emoji' => '💪',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide12/hardworking.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/hardworking.webp')
        ],

        [
            'text' => 'funny',
            'emoji' => '😂',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide12/funny.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/funny.webp')
        ],

        [
            'text' => 'talkative',
            'emoji' => '🗣️',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide12/talkative.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/talkative.webp')
        ],

        [
            'text' => 'sporty',
            'emoji' => '🏃',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide12/sporty.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/sporty.webp')
        ],

        [
            'text' => 'friendly',
            'emoji' => '😊',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide12/friendly.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/friendly.webp')
        ],

        [
            'text' => 'intelligent',
            'emoji' => '🧠',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide12/intelligent.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/intelligent.webp')
        ],

        [
            'text' => 'smart',
            'emoji' => '🎓',
            'sound' => materialAsset('slider/A2/Beginner/chapter-8/audios/slide12/smart.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide12/smart.webp')
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])