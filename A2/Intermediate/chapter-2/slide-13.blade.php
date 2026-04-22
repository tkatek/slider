<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Notice these cooking verbs',

    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3',

    'items' => [
        [
            'text'  => 'Mix',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide13/mix.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide13/mix.webp'),
        ],
        [
            'text'  => 'Add',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide13/add.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide13/add.webp'),
        ],
        [
            'text'  => 'Stir',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide13/stir.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide13/stir.webp'),
        ],
        [
            'text'  => 'Heat',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide13/heat.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide13/heat.webp'),
        ],
        [
            'text'  => 'Turn over',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide13/turn-over.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide13/turn-over.webp'),
        ],
        [
            'text'  => 'Take out',
            'emoji' => '',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide13/take-out.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-2/img/slide13/take-out.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
