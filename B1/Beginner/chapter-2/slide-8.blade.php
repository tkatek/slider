<?php
$content = [
    'title'      => 'New Language Expressions',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',

    'items' => [
        [
            'text'     => 'Took Care Of',
            'subtitle' => 'looked after',
            'emoji'    => '🤲',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide8/took-care-of.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide8/took-care-of.webp'),
        ],
        [
            'text'     => 'Stayed By His Side',
            'subtitle' => 'remained close to him',
            'emoji'    => '🧍‍♂️',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide8/stayed-by-his-side.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide8/stayed-by-his-side.webp'),
        ],
        [
            'text'     => 'Called For Help',
            'subtitle' => 'asked for help',
            'emoji'    => '📞',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide8/called-for-help.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide8/called-for-help.webp'),
        ],
        [
            'text'     => 'Saved His Life',
            'subtitle' => 'protected him from dying',
            'emoji'    => '🛟',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide8/saved-his-life.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide8/saved-his-life.webp'),
        ],
        [
            'text'     => 'Kindness Comes Back',
            'subtitle' => 'good actions return to you',
            'emoji'    => '🔁',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide8/kindness-comes-back.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide8/kindness-comes-back.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])