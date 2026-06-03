<?php
$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-4',

    'items' => [
        [
            'text'     => 'Stray Dog',
            'subtitle' => 'a dog without a home',
            'emoji'    => '🐕',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/stray-dog.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/stray-dog.webp'),
        ],
        [
            'text'     => 'Roadside',
            'subtitle' => 'the side of the road',
            'emoji'    => '🛣️',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/roadside.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/roadside.webp'),
        ],
        [
            'text'     => 'Nurse Back To Health',
            'subtitle' => 'help someone become healthy again',
            'emoji'    => '🩺',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/nurse-back-to-health.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/nurse-back-to-health.webp'),
        ],
        [
            'text'     => 'Companion',
            'subtitle' => 'a close friend',
            'emoji'    => '🤝',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/companion.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/companion.webp'),
        ],
        [
            'text'     => 'Collapse',
            'subtitle' => 'suddenly fall down',
            'emoji'    => '😵',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/collapse.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/collapse.webp'),
        ],
        [
            'text'     => 'Bark',
            'subtitle' => 'the sound a dog makes',
            'emoji'    => '🐶',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/bark.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/bark.webp'),
        ],
        [
            'text'     => 'Nearby',
            'subtitle' => 'close',
            'emoji'    => '📍',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/nearby.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/nearby.webp'),
        ],
        [
            'text'     => 'Rescue',
            'subtitle' => 'save from danger',
            'emoji'    => '🛟',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/rescue.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/rescue.webp'),
        ],
        [
            'text'     => 'Kindness',
            'subtitle' => 'being nice, caring, and helpful to others',
            'emoji'    => '💛',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/kindness.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/kindness.webp'),
        ],
        [
            'text'     => 'Loyal',
            'subtitle' => 'always supporting someone',
            'emoji'    => '🐾',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/loyal.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/loyal.webp'),
        ],
        [
            'text'     => 'Reminder',
            'subtitle' => 'something that makes you remember an',
            'emoji'    => '💭',
            'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide7/reminder.mp3'),
            'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide7/reminder.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])