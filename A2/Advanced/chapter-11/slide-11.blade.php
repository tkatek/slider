<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',

    'items' => [
        [
            'text'     => 'Medium',
            'subtitle' => 'Steak cooked in the middle level, not rare and not well done',
            'emoji'    => '🥩',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/medium.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/medium.webp'),
        ],
        [
            'text'     => 'Rare',
            'subtitle' => 'Meat that is cooked very lightly',
            'emoji'    => '🍖',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/rare.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/rare.webp'),
        ],
        [
            'text'     => 'Apologize',
            'subtitle' => 'To say sorry',
            'emoji'    => '🙏',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/apologize.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/apologize.webp'),
        ],
        [
            'text'     => 'Appreciate',
            'subtitle' => 'To be thankful for something',
            'emoji'    => '😊',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/appreciate.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/appreciate.webp'),
        ],
        [
            'text'     => 'Kitchen',
            'subtitle' => 'The place where food is prepared',
            'emoji'    => '👨‍🍳',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/kitchen.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/kitchen.webp'),
        ],
        [
            'text'     => 'Fresh Fries',
            'subtitle' => 'Newly cooked potato fries',
            'emoji'    => '🍟',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/fresh-fries.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/fresh-fries.webp'),
        ],
        [
            'text'     => 'Certainly',
            'subtitle' => 'Of course / definitely',
            'emoji'    => '✅',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/certainly.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/certainly.webp'),
        ],
        [
            'text'     => 'Sorted',
            'subtitle' => 'Fixed or arranged correctly',
            'emoji'    => '🛠️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/sorted.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/sorted.webp'),
        ],
        [
            'text'     => 'Right Away',
            'subtitle' => 'Immediately',
            'emoji'    => '⚡',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/right-away.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/right-away.webp'),
        ],
        [
            'text'     => 'As Quickly As Possible',
            'subtitle' => 'Very fast',
            'emoji'    => '🚀',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide11/as-quickly-as-possible.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide11/as-quickly-as-possible.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])