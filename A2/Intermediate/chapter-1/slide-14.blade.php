<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Key Traditional Clothes',

    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5',

    'items' => [
        [
            'text'     => 'Kimono',
            'subtitle' => 'Japan',
            'emoji'    => '👘',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/kimono.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/kimono.webp'),
        ],
        [
            'text'     => 'Sari',
            'subtitle' => 'India',
            'emoji'    => '🥻',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/sari.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/sari.webp'),
        ],
        [
            'text'     => 'Kilt',
            'subtitle' => 'Scotland',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/kilt.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/kilt.webp'),
        ],
        [
            'text'     => 'Sombrero',
            'subtitle' => 'Mexico',
            'emoji'    => '👒',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/sombrero.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/sombrero.webp'),
        ],
        [
            'text'     => 'Thobe / Dishdasha + Ghutra',
            'subtitle' => 'Saudi Arabia / Arab countries',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/thobe.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/thobe.webp'),
        ],
        [
            'text'     => 'Abaya + Hijab',
            'subtitle' => 'Arab countries',
            'emoji'    => '🧕',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/abaya.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/abaya.webp'),
        ],
        [
            'text'     => 'Cheongsam / Qipao',
            'subtitle' => 'China',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/cheongsam.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/cheongsam.webp'),
        ],
        [
            'text'     => 'Áo dài',
            'subtitle' => 'Vietnam',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/ao-dai.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/ao-dai.webp'),
        ],
        [
            'text'     => 'Sarafan',
            'subtitle' => 'Russia',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/sarafan.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/sarafan.webp'),
        ],
        [
            'text'     => 'Dashiki / Agbada',
            'subtitle' => 'Nigeria / Africa',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide14/dashiki.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-1/img/slide14/dashiki.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
