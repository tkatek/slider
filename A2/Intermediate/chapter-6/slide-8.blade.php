<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items'      => [
        [
            'text'     => 'A bar of soap',
            'subtitle' => 'a small block used for washing',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/a-bar-of-soap.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/a-bar-of-soap.webp'),
        ],
        [
            'text'     => 'Comedy club',
            'subtitle' => 'a place where people perform funny shows',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/comedy-club.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/comedy-club.webp'),
        ],
        [
            'text'     => 'Slip',
            'subtitle' => 'to lose your balance and slide by accident',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/slip.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/slip.webp'),
        ],
        [
            'text'     => 'Sprain your ankle',
            'subtitle' => 'to twist your ankle and hurt it',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/sprain-your-ankle.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/sprain-your-ankle.webp'),
        ],
        [
            'text'     => 'Crash through',
            'subtitle' => 'to break something as you go through it',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/crash-through.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/crash-through.webp'),
        ],
        [
            'text'     => 'Burn my skin',
            'subtitle' => 'to hurt your skin with something very hot',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/burn-my-skin.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/burn-my-skin.webp'),
        ],
        [
            'text'     => 'The cut',
            'subtitle' => 'a small opening on the skin made by something sharp',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-5/audios/slide6/the-cut.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-5/img/slide6/the-cut.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
