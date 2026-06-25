@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',

        'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',

        'items' => [
            [
                'text'     => 'inspire (verb)',
                'subtitle' => 'to make someone feel motivated to do something',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/inspire.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/inspire.webp'),
            ],
            [
                'text'     => 'inspiration (noun)',
                'subtitle' => 'a person or thing that motivates someone',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/inspiration.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/inspiration.webp'),
            ],
            [
                'text'     => 'encourage (verb)',
                'subtitle' => 'to give someone confidence or support',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/encourage.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/encourage.webp'),
            ],
            [
                'text'     => 'confident (adjective)',
                'subtitle' => 'feeling sure about your abilities',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/confident.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/confident.webp'),
            ],
            [
                'text'     => 'independent (adjective)',
                'subtitle' => 'able to do things without help',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/independent.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/independent.webp'),
            ],
            [
                'text'     => 'biography (noun)',
                'subtitle' => "a book about a person's life",
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/biography.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/biography.webp'),
            ],
            [
                'text'     => 'achievement (noun)',
                'subtitle' => 'something successful that you have done',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/achievement.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/achievement.webp'),
            ],
            [
                'text'     => 'determination (noun)',
                'subtitle' => 'the ability to continue trying despite difficulties',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/determination.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/determination.webp'),
            ],
            [
                'text'     => 'culture (noun)',
                'subtitle' => 'the customs and way of life of a group of people',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/culture.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/culture.webp'),
            ],
            [
                'text'     => 'open-minded (adjective)',
                'subtitle' => 'willing to consider new ideas',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/open-minded.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/open-minded.webp'),
            ],
            [
                'text'     => 'curious (adjective)',
                'subtitle' => 'eager to learn or know more',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/curious.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/curious.webp'),
            ],
            [
                'text'     => 'detail (noun)',
                'subtitle' => 'a small part of something',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide7/detail.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide7/detail.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])