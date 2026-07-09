@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-5',

        'items' => [
            [
                'text'     => 'Open-minded',
                'subtitle' => 'Willing to consider new ideas.',
                'example'  => '',
                'emoji'    => '🌍',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/open-minded.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/open-minded.webp'),
            ],
            [
                'text'     => 'Closed-minded',
                'subtitle' => 'Unwilling to consider different ideas.',
                'example'  => '',
                'emoji'    => '🚫',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/closed-minded.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/closed-minded.webp'),
            ],
            [
                'text'     => 'Perspective',
                'subtitle' => 'A way of seeing or understanding something.',
                'example'  => '',
                'emoji'    => '🔍',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/perspective.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/perspective.webp'),
            ],
            [
                'text'     => 'Culture',
                'subtitle' => 'The beliefs, customs, and traditions of a group.',
                'example'  => '',
                'emoji'    => '🏛️',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/culture.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/culture.webp'),
            ],
            [
                'text'     => 'Tradition',
                'subtitle' => 'A custom passed down over time.',
                'example'  => '',
                'emoji'    => '🕯️',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/tradition.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/tradition.webp'),
            ],
            [
                'text'     => 'Unique',
                'subtitle' => 'Different from everyone else.',
                'example'  => '',
                'emoji'    => '⭐',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/unique.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/unique.webp'),
            ],
            [
                'text'     => 'Appreciate',
                'subtitle' => 'To recognize and value something.',
                'example'  => '',
                'emoji'    => '🙏',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/appreciate.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/appreciate.webp'),
            ],
            [
                'text'     => 'Judgment',
                'subtitle' => 'An opinion formed about someone or something.',
                'example'  => '',
                'emoji'    => '⚖️',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/judgment.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/judgment.webp'),
            ],
            [
                'text'     => 'Friendship',
                'subtitle' => 'A relationship between friends.',
                'example'  => '',
                'emoji'    => '🤝',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/friendship.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/friendship.webp'),
            ],
            [
                'text'     => 'Superpower',
                'subtitle' => 'A special strength or ability.',
                'example'  => '',
                'emoji'    => '💪',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide7/superpower.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide7/superpower.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])