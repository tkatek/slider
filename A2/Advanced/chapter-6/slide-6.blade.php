<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',

    'items' => [
        [
            'text'             => 'Immigrate',
            'subtitle'         => 'To move to a new country to live there permanently.',
            'example_subtitle' => "When a person moves to a new country to live there, that's called immigrating.",
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide6/immigrate.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide6/immigrate.webp'),
        ],
        [
            'text'             => 'Immigrant',
            'subtitle'         => 'A person who moves to a different country to live.',
            'example_subtitle' => 'A person who does that is called an immigrant.',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide6/immigrant.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide6/immigrant.webp'),
        ],
        [
            'text'             => 'Opportunities',
            'subtitle'         => 'Chances for a better situation or success.',
            'example_subtitle' => '...find new opportunities, or feel safer.',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide6/opportunities.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide6/opportunities.webp'),
        ],
        [
            'text'             => 'Traditions',
            'subtitle'         => 'Customs or beliefs passed down through generations.',
            'example_subtitle' => '...they bring stories, traditions, and ideas...',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide6/traditions.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide6/traditions.webp'),
        ],
        [
            'text'             => 'Nervous',
            'subtitle'         => 'Feeling worried or anxious about something.',
            'example_subtitle' => 'Maybe you felt nervous.',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide6/nervous.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide6/nervous.webp'),
        ],
        [
            'text'             => 'Familiar',
            'subtitle'         => 'Well-known or easily recognized.',
            'example_subtitle' => '...you might miss what feels comfortable and familiar.',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide6/familiar.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide6/familiar.webp'),
        ],
        [
            'text'             => 'Belong',
            'subtitle'         => 'To feel like a proper or natural part of a group or place.',
            'example_subtitle' => '...we all want the same things: to be safe, to be cared for, to belong.',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide6/belong.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide6/belong.webp'),
        ],
        [
            'text'             => 'Routines',
            'subtitle'         => 'A sequence of actions regularly followed.',
            'example_subtitle' => 'You might not know the routines yet.',
            'sound'            => materialAsset('slider/A2/Advanced/chapter-6/audios/slide6/routines.mp3'),
            'image'            => materialAsset('slider/A2/Advanced/chapter-6/img/slide6/routines.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
