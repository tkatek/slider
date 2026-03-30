<?php
$content = [
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'compact_layout' => true,
    'subtitle'   => 'Read the travel advice to people going to Kenya in East Africa. Complete the text with you should or you shouldn’t',
    'questions'  => [
        [
            'img'      => '🌍',
            'segments' => [
                "It’s very hot in Kenya, so ",
                ['answer' => "you shouldn’t", 'wrong' => "you should"],
                " stay in the sun for too long and ",
                ['answer' => "you should", 'wrong' => "you shouldn’t"],
                " drink lots of water. ",
                ['answer' => "you should", 'wrong' => "you shouldn’t"],
                " buy bottled water and ",
                ['answer' => "you shouldn’t", 'wrong' => "you should"],
                " drink water from lakes or rivers. Most people speak English, but ",
                ['answer' => "you should", 'wrong' => "you shouldn’t"],
                " try to learn a few words of Swahili, the local language.",
            ],
        ],
    ],
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])
