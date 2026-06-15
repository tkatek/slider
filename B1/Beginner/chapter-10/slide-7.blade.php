@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',


        'groups' => [
            [
                'title' => '',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',
                'items' => [
                    [
                        'text'     => 'cooling rack',
                        'subtitle' => 'A metal rack where baked food cools down.',
                        'example'  => 'Emma looked at the cooling rack on the counter.',
                        'emoji'    => '🍪',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/cooling-rack.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/cooling-rack.webp'),
                    ],
                    [
                        'text'     => 'counter',
                        'subtitle' => 'The flat surface in a kitchen.',
                        'example'  => 'The cooling rack was on the counter.',
                        'emoji'    => '🍽️',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/counter.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/counter.webp'),
                    ],
                    [
                        'text'     => 'vanished',
                        'subtitle' => 'Disappeared suddenly.',
                        'example'  => 'The cookies had vanished.',
                        'emoji'    => '💨',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/vanished.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/vanished.webp'),
                    ],
                    [
                        'text'     => 'clue',
                        'subtitle' => 'Something that helps solve a mystery.',
                        'example'  => 'Emma searched for clues.',
                        'emoji'    => '🔎',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/clue.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/clue.webp'),
                    ],
                    [
                        'text'     => 'investigate',
                        'subtitle' => 'To try to find out what happened.',
                        'example'  => 'She used a magnifying glass to investigate.',
                        'emoji'    => '🕵️',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/investigate.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/investigate.webp'),
                    ],
                    [
                        'text'     => 'magnifying glass',
                        'subtitle' => 'A tool that makes things look larger.',
                        'example'  => 'Emma picked up her magnifying glass.',
                        'emoji'    => '🔍',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/magnifying-glass.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/magnifying-glass.webp'),
                    ],
                    [
                        'text'     => 'snoozed',
                        'subtitle' => 'Slept lightly or for a short time.',
                        'example'  => 'Barnaby had snoozed by the window.',
                        'emoji'    => '😴',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/snoozed.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/snoozed.webp'),
                    ],
                    [
                        'text'     => 'crumbs',
                        'subtitle' => 'Small pieces of food.',
                        'example'  => 'There were crumbs on the ground.',
                        'emoji'    => '🍞',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/crumbs.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/crumbs.webp'),
                    ],
                    [
                        'text'     => 'trail',
                        'subtitle' => 'A line or path left behind.',
                        'example'  => 'Emma found a trail of crumbs.',
                        'emoji'    => '👣',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/trail.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/trail.webp'),
                    ],
                    [
                        'text'     => 'smudge',
                        'subtitle' => 'A small dirty mark.',
                        'example'  => 'Arthur had a smudge of chocolate on his cheek.',
                        'emoji'    => '🍫',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/smudge.mp3'),
                        'image'    => materialAsset('slider/B1/Beginner/chapter-10/img/slide7/smudge.webp'),
                    ],
                ],
            ],
            [
                'title' => '',
                'grid_class' => 'grid-cols-1 sm:grid-cols-3',
                'items' => [
                    [
                        'text'     => 'sheepish',
                        'subtitle' => 'Looking embarrassed or guilty.',
                        'example'  => 'Arthur looked very sheepish.',
                        'emoji'    => '😅',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/sheepish.mp3'),
                    ],
                    [
                        'text'     => 'assumed',
                        'subtitle' => 'Thought something was true without checking.',
                        'example'  => 'He had assumed the cookies were for everyone.',
                        'emoji'    => '🤔',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/assumed.mp3'),
                    ],
                    [
                        'text'     => 'double batch',
                        'subtitle' => 'Twice the usual amount.',
                        'example'  => 'They decided to bake a double batch.',
                        'emoji'    => '🍪',
                        'sound'    => materialAsset('slider/B1/Beginner/chapter-10/audios/slide7/double-batch.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])