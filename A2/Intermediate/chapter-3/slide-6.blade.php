<?php
$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [

        [
            'text'     => 'Superstition',
            'subtitle' => 'a belief that is not based on fact',
            'emoji'    => '🧿',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/superstition.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/superstition.webp'),
        ],

        [
            'text'     => 'Unlucky',
            'subtitle' => 'bringing bad luck',
            'emoji'    => '😟',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/unlucky.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/unlucky.webp'),
        ],

        [
            'text'     => 'Lucky',
            'subtitle' => 'bringing good luck',
            'emoji'    => '🍀',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/lucky.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/lucky.webp'),
        ],

        [
            'text'     => 'Skip',
            'subtitle' => 'to leave out or not include',
            'emoji'    => '⏭️',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/skip.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/skip.webp'),
        ],

        [
            'text'     => 'Office building',
            'subtitle' => 'a place where people work',
            'emoji'    => '🏢',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/office-building.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/office-building.webp'),
        ],

        [
            'text'     => 'Host (an event)',
            'subtitle' => 'to organize or hold an event',
            'emoji'    => '🎤',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/host.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/host.webp'),
        ],

        [
            'text'     => 'Culture',
            'subtitle' => 'the ideas and traditions of a group of people',
            'emoji'    => '🌍',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/culture.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/culture.webp'),
        ],

        [
            'text'     => 'Symbol',
            'subtitle' => 'something that represents an idea (e.g., dove = peace)',
            'emoji'    => '🕊️',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/symbol.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/symbol.webp'),
        ],

        [
            'text'     => 'Penny',
            'subtitle' => 'a small coin in the U.S.',
            'emoji'    => '🪙',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/penny.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/penny.webp'),
        ],

        [
            'text'     => 'Strange',
            'subtitle' => 'unusual or surprising',
            'emoji'    => '🤨',
            'sound'    => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide6/strange.mp3'),
            'image'    => materialAsset('slider/A2/Intermediate/chapter-3/img/slide6/strange.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])