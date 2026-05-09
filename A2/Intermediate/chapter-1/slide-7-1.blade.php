<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Regions & People',
    'groups'     => [

        [
            'key'        => 'regions-and-people',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',
            'items'      => [
                [
                    'text'  => 'Gulf countries',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/gulf-countries.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/gulf-countries.webp'),
                ],
                [
                    'text'  => 'European / South American countries',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/european-south-american-countries.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/european-south-american-countries.webp'),
                ],
                [
                    'text'  => 'East Asian / Southeast Asian countries',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/east-asian.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/east-asian-southeast-asian-countries.webp'),
                ],
                [
                    'text'  => 'Māori people',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/maori-people.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/maori-people.webp'),
                ],
                [
                    'text'  => 'Inuit people',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/inuit-people.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/inuit-people.webp'),
                ],
                [
                    'text'  => 'Arctic regions',
                    'sound' => materialAsset('slider/A2/Intermediate/chapter-1/audios/slide7/arctic-regions.mp3'),
                    'image' => materialAsset('slider/A2/Intermediate/chapter-1/img/slide7/arctic-regions.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])