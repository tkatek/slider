<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Key Vocabulary in Sports',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',

    'items' => [

        [
            'text'     => 'Stadium',
            'subtitle' => 'Place where games and events occur',
            'emoji'    => '🏟️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide7/stadium.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-1/img/slide7/stadium.webp'),
        ],

        [
            'text'     => 'Team',
            'subtitle' => 'Group of players competing together',
            'emoji'    => '👥',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide7/team.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-1/img/slide7/team.webp'),
        ],

        [
            'text'     => 'Match',
            'subtitle' => 'A game played between two teams',
            'emoji'    => '⚽',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide7/match.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-1/img/slide7/match.webp'),
        ],

        [
            'text'     => 'Ticket',
            'subtitle' => 'Pass allowing entry to the stadium',
            'emoji'    => '🎟️',
            'sound'    => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide7/ticket.mp3'),
            'image'    => materialAsset('slider/A1/Intermediate/chapter-1/img/slide7/ticket.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])