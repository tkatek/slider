<?php

$content = [

    'title'      => 'New vocabulary & language',
    'subtitle'   => '',

    'groups' => [
        [
            'key'        => 'word-phrase',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items'      => [
                [
                    'text'     => 'Kindness',
                    'subtitle' => 'being caring and helpful',
                    'emoji'    => '💛',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/kindness.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide11/kindness.webp'),
                ],
                [
                    'text'     => 'Random Act Of Kindness',
                    'subtitle' => 'a small kind action for someone',
                    'emoji'    => '🎁',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/random-act-of-kindness.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide11/random-act-of-kindness.webp'),
                ],
                [
                    'text'     => 'Psychologist',
                    'subtitle' => 'a person who studies the mind and feelings',
                    'emoji'    => '🧠',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/psychologist.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide11/psychologist.webp'),
                ],
                [
                    'text'     => 'Warm Glow',
                    'subtitle' => 'a happy feeling inside',
                    'emoji'    => '✨',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/warm-glow.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide11/warm-glow.webp'),
                ],
                [
                    'text'     => 'Compassion',
                    'subtitle' => 'caring about other people’s problems',
                    'emoji'    => '🤲',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/compassion.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide11/compassion.webp'),
                ],
                [
                    'text'     => 'Society',
                    'subtitle' => 'people living together in a community',
                    'emoji'    => '🏘️',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/society.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide11/society.webp'),
                ],
                [
                    'text'     => 'Stranger',
                    'subtitle' => 'someone you do not know',
                    'emoji'    => '👤',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/stranger.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-2/img/slide11/stranger.webp'),
                ],
            ],
        ],
        [
            'key'        => 'expressions',
            'title'      => 'Expression',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
            'items'      => [
                [
                    'text'  => 'It felt really good.',
                    'emoji' => '🙂',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/it-felt-really-good.mp3'),
                ],
                [
                    'text'  => 'Make A Difference',
                    'emoji' => '🌟',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/make-a-difference.mp3'),
                ],
                [
                    'text'  => 'Give Someone A Smile',
                    'emoji' => '😊',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/give-someone-a-smile.mp3'),
                ],
                [
                    'text'  => 'Small Acts Of Kindness',
                    'emoji' => '💛',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-2/audios/slide11/small-acts-of-kindness.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])