<?php
$content = [
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Going to am/is/are',
    "questions" => [
        [
            "img" => "🚗",
            "segments" => [
                "I ",
                ["answer" => "am", "wrong" => ["is", "are"]],
                " going to buy a car."
            ]
        ],
        [
            "img" => "🎾",
            "segments" => [
                "She ",
                ["answer" => "is", "wrong" => ["am", "are"]],
                " going to play tennis next week."
            ]
        ],
        [
            "img" => "🛌",
            "segments" => [
                "We ",
                ["answer" => "are", "wrong" => ["am", "is"]],
                " going to sleep all day."
            ]
        ],
        [
            "img" => "🛍️",
            "segments" => [
                "My mum ",
                ["answer" => "is", "wrong" => ["am", "are"]],
                " going to go shopping."
            ]
        ],
        [
            "img" => "⚽",
            "segments" => [
                "Jack and Sam ",
                ["answer" => "are", "wrong" => ["am", "is"]],
                " going to play football after the leasson"
            ]
        ],
        [
            "img" => "✈️",
            "segments" => [
                "My friends ",
                ["answer" => "aren't", "wrong" => ["am not", "isn't"]],
                " going to go to the UK."
            ]
        ],
        [
            "img" => "🎣",
            "segments" => [
                "I ",
                ["answer" => "am not", "wrong" => ["isn't", "aren't"]],
                " going to go fishing."
            ]
        ],
        [
            "img" => "🏊",
            "segments" => [
                ["answer" => "Are", "wrong" => ["Am", "Is"]],
                " you going to swim in the sea?"
            ]
        ],
        [
            "img" => "🚴",
            "segments" => [
                ["answer" => "Is", "wrong" => ["Am", "Are"]],
                " your dad going to ride a bike?"
            ]
        ]
    ]
];
?>

@include("slider.game.dropdown-blanks", ['content' => $content])