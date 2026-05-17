<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',

    'items' => [
        [
            'text'     => 'Take Out The Trash',
            'subtitle' => 'Put the garbage outside',
            'emoji'    => '🗑️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-12/audios/slide6/take-out-the-trash.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-12/img/slide6/take-out-the-trash.webp'),
        ],
        [
            'text'     => 'Gross',
            'subtitle' => 'Very unpleasant or dirty',
            'emoji'    => '🤢',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-12/audios/slide6/gross.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-12/img/slide6/gross.webp'),
        ],
        [
            'text'     => 'Best Part',
            'subtitle' => 'The most exciting or enjoyable part',
            'emoji'    => '⭐',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-12/audios/slide6/best-part.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-12/img/slide6/best-part.webp'),
        ],
        [
            'text'     => 'Vacuum',
            'subtitle' => 'A machine used to clean floors',
            'emoji'    => '🧹',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-12/audios/slide6/vacuum.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-12/img/slide6/vacuum.webp'),
        ],
        [
            'text'     => 'Cave',
            'subtitle' => 'A dark underground place',
            'emoji'    => '🕳️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-12/audios/slide6/cave.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-12/img/slide6/cave.webp'),
        ],
        [
            'text'     => 'Pale',
            'subtitle' => 'Having very light skin color',
            'emoji'    => '😶',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-12/audios/slide6/pale.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-12/img/slide6/pale.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
