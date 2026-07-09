@php
    $content = [
        'title'    => 'New Vocabulary',
        'subtitle' => '',

        'groups' => [
            [
                'key'        => 'with-images',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',
                'items' => [
                    [
                        'text'     => 'locked (adj.)',
                        'subtitle' => 'closed and not able to be opened',
                        'emoji'    => '🔒',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/locked.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/locked.webp'),
                    ],
                    [
                        'text'     => 'security camera (n.)',
                        'subtitle' => 'a camera used to watch and protect a place',
                        'emoji'    => '📹',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/security-camera.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/security-camera.webp'),
                    ],
                    [
                        'text'     => 'priceless (adj.)',
                        'subtitle' => 'very valuable; cannot be bought with money',
                        'emoji'    => '💎',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/priceless.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/priceless.webp'),
                    ],
                    [
                        'text'     => 'disappear (v.)',
                        'subtitle' => 'to go away or be no longer seen',
                        'emoji'    => '⬜',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/disappear.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/disappear.webp'),
                    ],
                    [
                        'text'     => 'flicker (v.)',
                        'subtitle' => 'to shine with an unsteady light',
                        'emoji'    => '💡',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/flicker.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/flicker.webp'),
                    ],
                    [
                        'text'     => 'footprint (n.)',
                        'subtitle' => 'a mark left by a foot on the ground',
                        'emoji'    => '🦶',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/footprint.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/footprint.webp'),
                    ],
                    [
                        'text'     => 'passage (n.)',
                        'subtitle' => 'a hidden way or corridor',
                        'emoji'    => '🕳️',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/passage.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/passage.webp'),
                    ],
                    [
                        'text'     => 'handwritten (adj.)',
                        'subtitle' => 'written by hand, not printed or typed',
                        'emoji'    => '📝',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/handwritten.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/handwritten.webp'),
                    ],
                    [
                        'text'     => 'clue (n.)',
                        'subtitle' => 'information that helps to solve a mystery',
                        'emoji'    => '🔍',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/clue.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/clue.webp'),
                    ],
                    [
                        'text'     => 'investigator (n.)',
                        'subtitle' => 'a person who looks for facts and solves cases',
                        'emoji'    => '🕵️',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-3/audios/slide6/investigator.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide6/investigator.webp'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])