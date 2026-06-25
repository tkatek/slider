<?php

$content = [
    'page_title' => 'Speaking',
    'title'      => 'Speaking',
    'subtitle'   => '',
    'card_label' => '',
    'example'    => '',

    'card_type'  => 'image',

    'cards' => [
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide20/inspirational-people.webp'),
            'sentence' => 'Who are the most inspirational people in society?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide20/film-or-book.webp'),
            'sentence' => 'Which film or book has inspired you? Why?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide20/politician.webp'),
            'sentence' => 'Which politician inspires you the most? Why?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide20/parents-inspire-children.webp'),
            'sentence' => 'How do parents inspire their children?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide20/better-world.webp'),
            'sentence' => 'How can you make the world a better place?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide20/bosses-inspire-workers.webp'),
            'sentence' => 'How can bosses inspire their workers?',
        ],
        [
            'image'    => materialAsset('slider/B1/Intermediate/chapter-9/img/slide20/role-model.webp'),
            'sentence' => 'Who is your role-model?',
        ],
    ],
];

?>

@include("slider.game.speaking-cards-v2", ["content" => $content])