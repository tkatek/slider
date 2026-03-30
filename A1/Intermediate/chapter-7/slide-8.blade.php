<?php
$content = array_replace_recursive([
    'page_title'    => 'Practice 3: Listening',
    'title'         => 'Practice 3: Listening',
    'subtitle'      => 'Listen to Amira, Amir and Ali  talk about their holiday plans this summer, Match them with pictures',
    'theme'         => '#6366f1',

    'speakers' => [
        [
            'id'     => 'amira',
            'name'   => 'Amira',
            'audio'  => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-10/amira.mpeg'),
            'photo'  => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-10/amira.webp'),
            'answer' => 'cooking_school',
        ],
        [
            'id'     => 'amir',
            'name'   => 'Amir',
            'audio'  => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-10/amir.mpeg'),
            'photo'  => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-10/amir.webp'),
            'answer' => 'norway_cruise',
        ],
        [
            'id'     => 'ali',
            'name'   => 'Ali',
            'audio'  => materialAsset('slider/A1/Intermediate/chapter-7/audio/slide-10/ali.mpeg'),
            'photo'  => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-10/ali.webp'),
            'answer' => 'farm_work',
        ],
    ],

    'choices' => [
        [
            'id'    => 'norway_cruise',
            'label' => 'A',
            'title' => 'Cruise trip',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-10/cruiser.webp'),
        ],
        [
            'id'    => 'farm_work',
            'label' => 'B',
            'title' => 'Farm work',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-10/farm.webp'),
        ],
        [
            'id'    => 'cooking_school',
            'label' => 'C',
            'title' => 'Cooking school',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-10/kitchen.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.drag-and-drop-audio-image", ['content' => $content])