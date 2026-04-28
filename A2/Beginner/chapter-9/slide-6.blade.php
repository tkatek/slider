<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'items' => [
        [
            'text'  => 'athletic',
            'emoji' => '🏃',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/athletic.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/athletic.webp'),
        ],
        [
            'text'  => 'defined eyebrows',
            'emoji' => '👁️',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/defined-eyebrows.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/defined-eyebrows.webp'),
        ],
        [
            'text'  => 'a dose of spirit',
            'emoji' => '✨',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/a-dose-of-spirit.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/a-dose-of-spirit.webp'),
        ],
        [
            'text'  => 'supportive',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/supportive.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/supportive.webp'),
        ],
        [
            'text'  => 'helpful',
            'emoji' => '🙌',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/helpful.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/helpful.webp'),
        ],
        [
            'text'  => 'dress in',
            'emoji' => '👗',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/dress-in.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/dress-in.webp'),
        ],
        [
            'text'  => 'comfortable clothes',
            'emoji' => '👕',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/comfortable-clothes.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/comfortable-clothes.webp'),
        ],
        [
            'text'  => 'put on make up',
            'emoji' => '💄',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/put-on-make-up.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/put-on-make-up.webp'),
        ],
        [
            'text'  => 'famous',
            'emoji' => '⭐',
            'sound' => materialAsset('slider/A2/Beginner/chapter-9/audios/slide6/famous.mpeg'),
            'image' => materialAsset('slider/A2/Beginner/chapter-9/img/slide6/famois.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])

