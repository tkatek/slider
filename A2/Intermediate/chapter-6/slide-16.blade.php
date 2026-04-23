<?php
$content = [
    'page_title' => 'Writing',
    'title'      => 'Writing',
    'subtitle'   => 'Use the past continuous and the past simple of the verbs in brackets to complete the sentences about each picture',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'items' => [
        [
            'number' => 1,
            'image'  => materialAsset('slider/A2/Intermediate/chapter-6/img/slide16/1.webp'),
            'parts'  => [
                ['text' => 'When I '],
                ['answer' => 'WAS WALKING'],
                ['text' => ' down the street, I '],
                ['answer' => 'FOUND'],
                ['text' => ' ten pounds.'],
            ],
        ],
        [
            'number' => 2,
            'image'  => materialAsset('slider/A2/Intermediate/chapter-6/img/slide16/2.webp'),
            'parts'  => [
                ['text' => 'It '],
                ['answer' => 'WAS RAINING'],
                ['text' => ' when she '],
                ['answer' => 'LEFT'],
                ['text' => ' the house.'],
            ],
        ],
        [
            'number' => 3,
            'image'  => materialAsset('slider/A2/Intermediate/chapter-6/img/slide16/3.webp'),
            'parts'  => [
                ['text' => 'When you '],
                ['answer' => 'CALLED'],
                ['text' => ' me, I '],
                ['answer' => 'WAS COOKING'],
                ['text' => ' dinner.'],
            ],
        ],
        [
            'number' => 4,
            'image'  => materialAsset('slider/A2/Intermediate/chapter-6/img/slide16/4.webp'),
            'parts'  => [
                ['text' => 'They '],
                ['answer' => "WEREN'T WORKING"],
                ['text' => ' quietly when the teacher '],
                ['answer' => 'CAME'],
                ['text' => ' back.'],
            ],
        ],
    ],
];
?>

@include('slider.game.image-missing-words', ['content' => $content])
