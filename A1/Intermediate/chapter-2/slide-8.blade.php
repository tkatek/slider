<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Most famous Celebrations around the world',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',

    'items'      => [
        [
            'text'  => 'Birthday party',
            'emoji' => '🎂',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/birthday-party.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/birthday-party.webp"),
        ],
        [
            'text'  => 'Christmas',
            'emoji' => '🎄',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/christmas.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/christmas.webp"),
        ],
        [
            'text'  => 'Easter',
            'emoji' => '🐣',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/easter.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/easter.webp"),
        ],
        [
            'text'  => 'Engagement',
            'emoji' => '💍',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/engagement.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/engagement.webp"),
        ],

        [
            'text'  => 'Halloween',
            'emoji' => '🎃',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/halloween.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/halloween.webp"),
        ],
        [
            'text'  => 'Thanksgiving',
            'emoji' => '🦃',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/thanksgiving.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/thanksgiving.webp"),
        ],
        [
            'text'  => "Valentine's Day",
            'emoji' => '❤️',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/valentine.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/valentines-day.webp"),
        ],
        [
            'text'  => 'Wedding anniversary',
            'emoji' => '💑',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/wedding-anniversary.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/wedding-anniversary.webp"),
        ],

        [
            'text'  => 'Wedding ceremony',
            'emoji' => '💒',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/wedding-ceremony.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/wedding-ceremony.webp"),
        ],
        [
            'text'  => 'Wedding reception / wedding party',
            'emoji' => '🥂',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/wedding-reception-party.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/wedding-reception.webp"),
        ],
        [
            'text'  => 'Graduation',
            'emoji' => '🎓',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/graduation.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/graduation.webp"),
        ],
        [
            'text'  => 'Retirement',
            'emoji' => '🏖️',
            'sound' => materialAsset("slider/A1/Intermediate/chapter-2/audios/slide7/retirement.mp3"),
            'image' => materialAsset("slider/A1/Intermediate/chapter-2/img/slide7/retirement.webp"),
        ],
    ],
];
?>

@include("slider.vocab.image-emoji-audio", ['content' => $content])