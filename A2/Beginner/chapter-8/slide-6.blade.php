<?php
$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => 'Appearances',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',
    'image_text_style' => 'overlay',

    'items' => [
        [
            'text'     => 'Overweight',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Overweight.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Overweight.webp'),
        ],
        [
            'text'     => 'Wrist',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Wrist.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Wrist.webp'),
        ],
        [
            'text'     => 'Average height',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Average-height.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/average height.webp'),
        ],
        [
            'text'     => 'Stocky',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Stocky.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Stocky.webp'),
        ],
        [
            'text'     => 'Freckles',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Freckles.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Freckles.webp'),
        ],
        [
            'text'     => 'Braces',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/braces.mp3.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Baces.webp'),
        ],
        [
            'text'     => 'Fingernails',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Fingernails.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Fingernails.webp'),
        ],
        [
            'text'     => 'Muscular',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Muscular.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Muscular.webp'),
        ],
        [
            'text'     => 'Ponytail',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Ponytail.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Ponytail.webp'),
        ],
        [
            'text'     => 'Cornrows',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Cornrows.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/cornrows.webp'),
        ],
        [
            'text'     => 'Pierced ears',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Pierced-ears.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Pierced-ears.webp'),
        ],
        [
            'text'     => 'Braids',
            'subtitle' => '',
            'emoji'    => '',
            'sound'    => materialAsset('slider/A2/Beginner/chapter-8/audios/slide6/Braids.mpeg'),
            'image'    => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/braided-hair.webp'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])