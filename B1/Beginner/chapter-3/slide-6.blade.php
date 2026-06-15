<?php
$content = [
    'title'      => 'New Vocabulary',
    'subtitle'   => '',


    'groups' => [
        [
            'key'        => 'with-images',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-4',
            'items'      => [
                [
                    'text'     => 'Apologize',
                    'subtitle' => 'say sorry for something',
                    'emoji'    => '🙏',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/apologize.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-3/img/slide6/apologize.webp'),
                ],
                [
                    'text'     => 'Fault',
                    'subtitle' => 'responsibility for a mistake',
                    'emoji'    => '⚠️',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/fault.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-3/img/slide6/fault.webp'),
                ],
                [
                    'text'     => 'Forgive',
                    'subtitle' => 'stop being angry with someone',
                    'emoji'    => '🤝',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/forgive.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-3/img/slide6/forgive.webp'),
                ],
                [
                    'text'     => 'Pardon Me',
                    'subtitle' => 'polite way to say sorry',
                    'emoji'    => '🙇',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/pardon-me.mp3'),
                    'image'    => materialAsset('slider/B1/Beginner/chapter-3/img/slide6/pardon-me.webp'),
                ],
            ],
        ],
        [
            'key'        => 'without-images',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6',
            'items'      => [
                [
                    'text'     => 'Truly Sorry',
                    'subtitle' => 'very sorry',
                    'emoji'    => '😔',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/truly-sorry.mp3'),
                ],
                [
                    'text'     => 'No Harm Done',
                    'subtitle' => 'the mistake did not cause a serious problem',
                    'emoji'    => '✅',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/no-harm-done.mp3'),
                ],
                [
                    'text'     => 'No Worries',
                    'subtitle' => 'it is okay / don’t worry',
                    'emoji'    => '🙂',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/no-worries.mp3'),
                ],
                [
                    'text'     => 'Accept An Apology',
                    'subtitle' => 'forgive someone after they say sorry',
                    'emoji'    => '🕊️',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/accept-an-apology.mp3'),
                ],
                [
                    'text'     => 'Terribly Sorry',
                    'subtitle' => 'very sorry',
                    'emoji'    => '😢',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/terribly-sorry.mp3'),
                ],
                [
                    'text'     => 'Forget About It',
                    'subtitle' => 'don’t worry about the mistake',
                    'emoji'    => '💬',
                    'sound'    => materialAsset('slider/B1/Beginner/chapter-3/audios/slide6/forget-about-it.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])