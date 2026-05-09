<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

    'items' => [
        [
            'text'     => 'get homesick',
            'subtitle' => 'Feeling sad because you miss home.',
            'emoji'    => '🏠',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide6/get-homesick.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-5/img/slide6/get-homesick.webp'),
        ],
        [
            'text'     => 'hug',
            'subtitle' => 'To hold someone close with your arms.',
            'emoji'    => '🤗',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide6/hug.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-5/img/slide6/hug.webp'),
        ],
        [
            'text'     => 'nagging',
            'subtitle' => 'When someone keeps annoying you again and again.',
            'emoji'    => '🗣️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide6/nagging.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-5/img/slide6/nagging.webp'),
        ],
        [
            'text'     => 'relearn',
            'subtitle' => 'To learn something again.',
            'emoji'    => '📚',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide6/relearn.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-5/img/slide6/relearn.webp'),
        ],
        [
            'text'     => 'miss',
            'subtitle' => 'To feel sad because someone or something is not with you.',
            'emoji'    => '💭',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide6/miss.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-5/img/slide6/miss.webp'),
        ],
        [
            'text'     => 'adapt',
            'subtitle' => 'To change so you can fit or do well in a new situation.',
            'emoji'    => '🌱',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide6/adapt.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-5/img/slide6/adapt.webp'),
        ],
        [
            'text'     => 'goals',
            'subtitle' => 'Things you want to reach or achieve.',
            'emoji'    => '🎯',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide6/goals.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-5/img/slide6/goals.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
