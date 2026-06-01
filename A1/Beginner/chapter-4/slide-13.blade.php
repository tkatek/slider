<?php

$content = [
    'page_title' => 'Speaking Cards',
    'title'      => 'Speaking Cards',
    'subtitle'   => 'Possessive Adjectives',
    'card_label' => '',
    'example'    => 'My sister is thin.',

    'card_type'  => 'image',

    'cards' => [
        [

            'image'    => materialAsset('slider/A1/Beginner/chapter-4/img/slide13/grandpa-tall.webp'),
            'sentence' => 'Grandpa / tall',
        ],
        [

            'image'    => materialAsset('slider/A1/Beginner/chapter-4/img/slide13/mom-tall.webp'),
            'sentence' => 'Mom / tall',
        ],
        [

            'image'    => materialAsset('slider/A1/Beginner/chapter-4/img/slide13/dad-tall.webp'),
            'sentence' => 'Dad / tall',
        ],
        [

            'image'    => materialAsset('slider/A1/Beginner/chapter-4/img/slide13/grandma-short.webp'),
            'sentence' => 'Grandma / short',
        ],
        [

            'image'    => materialAsset('slider/A1/Beginner/chapter-4/img/slide13/brother-short.webp'),
            'sentence' => 'Brother / short',
        ],
        [

            'image'    => materialAsset('slider/A1/Beginner/chapter-4/img/slide13/sister-short.webp'),
            'sentence' => 'Sister / short',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])