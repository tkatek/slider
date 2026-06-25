@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5',

        'items' => [
            [
                'text'     => 'friend request (noun)',
                'subtitle' => 'A request sent on social media asking someone to connect with you.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/friend-request.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/friend-request.webp'),
            ],
            [
                'text'     => 'popular (adjective)',
                'subtitle' => 'Liked or known by many people.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/popular.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/popular.webp'),
            ],
            [
                'text'     => 'proper friend (noun)',
                'subtitle' => 'A close and genuine friend.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/proper-friend.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/proper-friend.webp'),
            ],
            [
                'text'     => 'acquaintance (noun)',
                'subtitle' => 'Someone you know, but not very well.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/acquaintance.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/acquaintance.webp'),
            ],
            [
                'text'     => 'lonely (adjective)',
                'subtitle' => 'Feeling unhappy because you do not have enough friends or company.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/lonely.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/lonely.webp'),
            ],
            [
                'text'     => 'social media (noun)',
                'subtitle' => 'Websites and apps used to communicate and share content online.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/social-media.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/social-media.webp'),
            ],
            [
                'text'     => 'online (adjective)',
                'subtitle' => 'Connected to the internet and active on a website or app.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/online.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/online.webp'),
            ],
            [
                'text'     => 'reply (verb/noun)',
                'subtitle' => 'To answer a message, question, or request.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/reply.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/reply.webp'),
            ],
            [
                'text'     => 'accept (verb)',
                'subtitle' => 'To agree to receive or allow something, such as a friend request.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/accept.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/accept.webp'),
            ],
            [
                'text'     => 'disappear (verb)',
                'subtitle' => 'To stop being present or available.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide7/disappear.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-1/img/slide7/disappear.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])