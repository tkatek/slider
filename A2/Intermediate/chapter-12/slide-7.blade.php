<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [
        [
            'text'  => 'Smiling',
            'emoji' => '😊',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/smiling.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/smiling.webp'),
        ],
        [
            'text'  => 'Making eye contact',
            'emoji' => '👀',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/making-eye-contact.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/making-eye-contact.webp'),
        ],
        [
            'text'  => 'Shaking hands firmly',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/shaking-hands-firmly.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/shaking-hands-firmly.webp'),
        ],
        [
            'text'  => 'Sitting up straight',
            'emoji' => '🪑',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/sitting-up-straight.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/sitting-up-straight.webp'),
        ],
        [
            'text'  => 'Staring',
            'emoji' => '👁️',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/staring.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/staring.webp'),
        ],
        [
            'text'  => 'Crossing arms',
            'emoji' => '🙅',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/crossing-arms.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/crossing-arms.webp'),
        ],
        [
            'text'  => 'Yawning',
            'emoji' => '🥱',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/yawning.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/yawning.webp'),
        ],
        [
            'text'  => 'Slouching',
            'emoji' => '🧍',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/slouching.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/slouching.webp'),
        ],
        [
            'text'  => 'Paying attention',
            'emoji' => '🎧',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/paying-attention.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/paying-attention.webp'),
        ],
        [
            'text'  => 'Nodding your head',
            'emoji' => '🙂',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/nodding-your-head.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/nodding-your-head.webp'),
        ],
        [
            'text'  => 'Leaning forward',
            'emoji' => '➡️',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/leaning-forward.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/leaning-forward.webp'),
        ],
        [
            'text'  => 'Open palms',
            'emoji' => '👐',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/open-palms.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/open-palms.webp'),
        ],
        [
            'text'  => 'Looking down',
            'emoji' => '👇',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/looking-down.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/looking-down.webp'),
        ],
        [
            'text'  => 'Rubbing your nose',
            'emoji' => '👃',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/rubbing-your-nose.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/rubbing-your-nose.webp'),
        ],
        [
            'text'  => 'Frowning',
            'emoji' => '☹️',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/frowning.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/frowning.webp'),
        ],
        [
            'text'  => 'Head in hands',
            'emoji' => '🤦',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide7/head-in-hands.mp3'),
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/head-in-hands.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])