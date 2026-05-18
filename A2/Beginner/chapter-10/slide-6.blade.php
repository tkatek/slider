<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',

    'items' => [
        [
            'text'     => 'care',
            'subtitle' => 'looking after yourself or others',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-10/audios/care.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide6/care.webp'),
        ],
        [
            'text'     => 'build muscles',
            'subtitle' => 'making your body stronger through food and movement',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-10/audios/build-muscles.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide6/build-muscles.webp'),
        ],
        [
            'text'     => 'energy',
            'subtitle' => 'the power your body uses to move, think, and play',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-10/audios/energy.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide6/energy.webp'),
        ],
        [
            'text'     => 'nutrients',
            'subtitle' => 'helpful parts of food that keep your body working well',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-10/audios/nutrients.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide6/nutrients.webp'),
        ],
        [
            'text'     => 'hydration / hydrated',
            'subtitle' => 'having enough water in your body to feel good',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-10/audios/hydration.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide6/hydration.webp'),
        ],
        [
            'text'     => 'personal hygiene',
            'subtitle' => 'keeping your body clean to stay healthy',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-10/audios/personal-hygiene.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide6/hygjene.webp'),
        ],
        [
            'text'     => 'sanitation',
            'subtitle' => 'keeping places clean to stop sickness from spreading',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-10/audios/sanitation.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide6/sanitation.webp'),
        ],
        [
            'text'     => 'kill germs',
            'subtitle' => 'removing tiny organisms that can make you sick',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-10/audios/kill-germs.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-10/img/slide6/kill-germs.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])