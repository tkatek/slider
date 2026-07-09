@php
    $content = [
        'title'      => 'New Language',
        'subtitle'   => 'Expressions & Language',

        'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-5',

        'items' => [
            [
                'text'     => 'stand up for someone',
                'subtitle' => 'defend or support someone',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/stand-up-for-someone.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/stand-up-for-someone.webp'),
            ],
            [
                'text'     => 'do what is right',
                'subtitle' => 'act in a morally good way',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/do-what-is-right.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/do-what-is-right.webp'),
            ],
            [
                'text'     => 'take a deep breath',
                'subtitle' => 'calm yourself',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/take-a-deep-breath.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/take-a-deep-breath.webp'),
            ],
            [
                'text'     => 'lend a hand',
                'subtitle' => 'help someone',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/lend-a-hand.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/lend-a-hand.webp'),
            ],
            [
                'text'     => 'make a difference',
                'subtitle' => 'have a positive impact',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/make-a-difference.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/make-a-difference.webp'),
            ],
            [
                'text'     => 'be known as',
                'subtitle' => 'be famous for something',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/be-known-as.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/be-known-as.webp'),
            ],
            [
                'text'     => 'all it takes is...',
                'subtitle' => 'the only thing needed is',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/all-it-takes-is.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/all-it-takes-is.webp'),
            ],
            [
                'text'     => 'go viral',
                'subtitle' => 'become very popular online',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/go-viral.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/go-viral.webp'),
            ],
            [
                'text'     => 'turn on someone',
                'subtitle' => 'suddenly attack someone',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/turn-on-someone.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/turn-on-someone.webp'),
            ],
            [
                'text'     => 'find the strength to',
                'subtitle' => 'gather courage',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-10/audios/slide10/find-the-strength-to.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-10/img/slide10/find-the-strength-to.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])